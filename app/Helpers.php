<?php 

 function generateRandomStr($length = 8) {
        $UpperStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $LowerStr = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        $symbols = "$*_-";
        $characters = $numbers.$symbols.$LowerStr.$UpperStr;
        $charactersLength = strlen($characters);
        $randomStr = null;
        for ($i = 0; $i < $length; $i++) {
            $randomStr .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomStr;
    }
   function generateRandomNumber($length = 8) {
       
        $numbers = "0123456789";
       
        $characters = $numbers;
        $charactersLength = strlen($characters);
        $randomStr = null;
        for ($i = 0; $i < $length; $i++) {
            $randomStr .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomStr;
    }

function translationadd($translation,$group_name,$value,$key=Null)
    {
      $language = config('app.locale');
      if(empty($key)){
     
      $key = convertlow_andremovespace($value);
    }

  
       $translation->addGroupTranslation($language, $group_name, $key, $value);

    }

   function convertlow_andremovespace($value){
      $value = trim(strtolower($value));
      $value = str_replace(' ','_',$value);
      $value = str_replace("'",'_',$value);
      return $value;
    }

    function img_process($img,$path,$name=null){
            try{ 
          if($img != null ){
               $imageDir = $path;
             
         $data = explode(',', $img );
         if(!empty($name)){
          $milli = $name.'_'.round(microtime(true) * 1000);
            }
            else{
              $milli = round(microtime(true) * 1000);
            }
           $value = base64_decode($data[1]);
      $ext = "";
       $source_img = imagecreatefromstring($value);
      if($data[0] == "data:image/png;base64" ){
        $ext = "png";
        $output_file = $imageDir.'/'.$milli.'.'.$ext;
         $imageSave = imagepng($source_img, $output_file, 9);
      }
     
      elseif($data[0] == "data:image/jpeg;base64" ){
        $ext = "jpg";
        $output_file = $imageDir.'/'.$milli.'.'.$ext;
         $imageSave = imagejpeg($source_img, $output_file, 100);
      }
      elseif($data[0] == "data:image/jpeg;base64" ){
        $ext = "jpg";
        $output_file = $imageDir.'/'.$milli.'.'.$ext;
        $imageSave = imagejpeg($source_img, $output_file, 100);
      }
       elseif($data[0] == "data:image/gif;base64" ){
        $ext = "gif";
        $output_file = $imageDir.'/'.$milli.'.'.$ext;
        $imageSave = imagegif($source_img, $output_file, 100);
      }
      else
      {

        exit;
      }
    
        imagedestroy($source_img);
        file_put_contents($output_file, $value);
        $array = [];
        $array[0]= $milli;
        $array[1]= $ext;
        return $array;
}
else{
    return false;
}
}
  catch(\Exception $e){

                return response()->json(['status'=>$e->getMessage()], 500);
            }
    }

    function image_compnent($file_table,$class=Null,$id=Null,$other_attr = array()){
      if(!empty($class)){
        $class = 'class="'.$class.'"';
      }
       if(!empty($id)){
        $id = 'id="'.$id.'"';
      }
      if(!empty($other_attr)){
        $other_attr = implode(' ',$other_attr,);
      }
      else{
        $other_attr = '';
      }
      /*image type*/
      if($file_table->type == 1 ){
        $tag = '<img alt="'.$file_table->alt_text.'" src="'.asset('public/storage'.$file_table->folder_location.'/'.$file_table->name).'"'.' '.$class.' '.$id.' '.$other_attr.'/>';
        return $tag; 
      }

      /*video type*/

      /*icon type*/

      /*pdf type*/

      /*svg type*/

      /*other type*/



    }
    function pricecal($rsp_w_gst,$gp){
      $gp_profit = ($rsp_w_gst*$gp)/100;
      $price = $rsp_w_gst+$gp_profit;
      return $price;

    }

    function sessionStart($session_key,$value){
      if(!session_id()) {
        session_start();
         if( isset( $_SESSION[$session_key] ) ) {
          return $_SESSION[$session_key];
         }
         else{
        $_SESSION[$session_key] = $value;
        return $_SESSION[$session_key];
      }
      }
      else{
        session_start();
        if( isset( $_SESSION[$session_key] ) ) {
          return $_SESSION[$session_key];
         }
         else{
        $_SESSION[$session_key] = $value;
        return $_SESSION[$session_key];
      }
      }

    }

    function sessionSet($key){
      if(!session_id()) {
        session_start();
        if(isset($_SESSION[$key])){
        return $_SESSION[$key];
      }
      else{
        return false;
      }

      }
      else{
         if(isset($_SESSION[$key])){
        return $_SESSION[$key];
      }
      else{
        return false;
      }
      }
    }

    function brokencartid($id){
        //product_varient_supplier
        $product_id = explode('_', $id);
        return $product_id;
    }
function difftwotime($carbon,$endtime,$starttime = null){
        $date = $carbon::parse($endtime);
        if(empty($starttime)){
          $now = $carbon::now();
        }
        else{
           $now = $carbon::parse($starttime);
        }
         $diff = $now->diff($date)->format('%M:%D:%H:%I:%S');

         $diff_array = explode(':', $diff);
      
        return $diff_array;



      }

      function removeUrlfirstpart($baseurl,$addPart,$Url){
        $dataurl = $baseurl.$addPart;
         $reurl =  str_replace($dataurl, " ", $Url);
         $reurl = trim($reurl);
         return $reurl;
      }

?>