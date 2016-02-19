@extends('templates.default')
 @section('content')
  {!! Form::open(array('url' =>'send'))!!}
      {!! csrf_field() !!}
      <center>
      <table style=" box-shadow:0 0 20px black; border-radius:25px; width:400px; height:200px; margin-top:100px">
        <tr>
        	<td colspan="2">
        		<center><h4 style="color:#0099FF">Give us your idea or question<br>If you find a product/category that is not listed
        		feel free to tell us so that we can add it as soon as possible:</h4></center><br>
        	</td>
        </tr>
       <tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject:</td>
		<td><input  type="text" name="subject" required/></td></tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Message:</td>
		<td><textarea cols="15" rows="3" name="message"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><button type="submit" class="btn btn-raised btn-info">Send</button><br></td>
	</tr>
      </table>
  </center>
 {!!Form::close() !!}
 @stop