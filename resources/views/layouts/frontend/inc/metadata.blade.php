<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{$metadata['app_setting']->meta_title}}" >
     <meta name="description" content="{{$metadata['app_setting']->meta_description}}">
  <meta name="keywords" content="{{$metadata['app_setting']->meta_keywords}}">
  <title>{{$metadata['app_setting']->title}}</title>
  @php 
  $favicon =$metadata['app_setting']->favicon;
  @endphp 
  <link rel="icon" href="{{asset('public/storage'.$favicon->folder_location.'/'.$favicon->name)}}" type="image/png">