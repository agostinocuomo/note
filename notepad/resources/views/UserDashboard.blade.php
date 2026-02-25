<!DOCTYPE html>
<html>
<head>
    <title>Notepad</title>

  @vite(['resources\js\welcome.js' , 'resources/css/welcome.css']);
@livewireStyles

</head>

<body>
@livewire('navbar')
@livewireScripts
    <livewire:dashboard />  
  
    

  
</body>