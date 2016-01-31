<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Schema;

class ModelCommand extends GeneratorCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The excluded columns for fillable.
     *
     * @var array
     */
    protected $exclude = ['id', 'password'];

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $table = $this->option('table')? : str_plural(strtolower($this->getNameInput()));

        return $this->replaceNamespace($stub, $name)->replaceTable($stub, $table)->replaceFillable($stub, $table)->replaceClass($stub, $name);
    }

    /**
     * Replace the table for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceTable(&amp;$stub, $table)
    {
        $stub = str_replace(
            '{{table}}', $table, $stub
        );

        return $this;
    }

    /**
     * Replace the fillable for the given stub.
     *
     * @param  string  $stub
     * @return $this
     */
    protected function replaceFillable(&amp;$stub, $table)
    {
        if($this->input->getOption('fillable'))
        {
            // Get the table columns
            $columns = Schema::getColumnListing($table);
            // Exclude the unwanted columns 
            $columns = array_filter($columns, function($value)
            {
              return !in_array($value, $this->exclude);
            });
            // Add quotes
            array_walk($columns, function(&amp;$value) {
                $value = "'" . $value . "'";
            });
            // CSV format
            $columns = implode(',', $columns);
        }

        $stub = str_replace(
            '{{fillable}}', isset($columns)? $columns : '', $stub
        );

        return $this;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['table', null, InputOption::VALUE_OPTIONAL, 'The table name.', null],
            ['fillable', null, InputOption::VALUE_NONE, 'The fillable columns.', null]
        ];
    }

}
