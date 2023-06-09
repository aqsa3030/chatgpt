<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <title>Chat GPT</title>

    <style>





        *{
            margin: 0px;
            padding: 0px;
        }
    ::-webkit-scrollbar{
        width: 5px;
    }
    ::-webkit-scrollbar-track{
        backface-visibility: #13254c;

    }
    ::-webkit-slider-thumb{
        background: #061228;
    }
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    position: sticky;
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}


    </style>
</head>
<body style="background: rgb(255, 255, 255)">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ChatGPT</h3>
            </div>

            <ul  class="list-unstyled components">
                <li id="sidebar" class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><label  for=""></label></a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                   <h1>ChatGPT</h1>
                </div>
            </nav>
            <div>
                <div>
                        <div  id="content-box" class="container-fluid p-2" style="height: calc(100vh- 150px);overflow-y: scroll;">
                            <br>
                        </div>
                </div>
                <div class="container-fluid w-100 px-3 py-2 d-flex" style="background:rgb(247, 245, 245);height: 64px;position:sticky;">
                    <div class="m-2 pl-2" style="background:#96a2be;width: calc(100% - 45px);border-radius: 5px;">
                        <input id="input" type="text" name="input" class="text-whblackite" style="background: none;width: 100%;height: 100%;border: 0px;outline: none;">
                    </div>
                    <div id="button-submit" class="text-center" type="button" style="background: #96a2be;height: 100%;width: 50px;border-redius: 5px; ">
                        <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px"></i>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]' ).attr('content')
    }

})
$('#button-submit').on('click', function(){
    $value=$('#input').val();
    $('#content-box').append('<div class="mb-2 "><div class="float-right px-3 py-2 mt-2 text-dark " style="width: 270px;height: 40px;border-radius: 10px;float: right;font-size: 85%;"><p class=" mt-2">'+$value+'</p> </div></div>');

    

    $.ajax({
        type: 'post',
        url: '{{url('send')}}',
        data: {
            'input':$value
        },
        success:function(data){
            $('#content-box').append(' <div class="d-flex mb-2"><div class=" px-3 py-2 mt-5 text-black " style="color: black;border-radius: 10px;float: right;font-size: 85%;"><p class=" mt-2">'+data+'</p> </div></div>')
            $value=$('#input').val('')
        }
    })

    


})


// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyBxH0VM30vf4MLJFPArMXne2xJu9mQsW78",
    authDomain: "chat-36272.firebaseapp.com",
    databaseURL: "https://chat-36272-default-rtdb.firebaseio.com",
    projectId: "chat-36272",
    storageBucket: "chat-36272.appspot.com",
    messagingSenderId: "810692906723",
    appId: "1:810692906723:web:7b3e248bc81220909effd6"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var database = firebase.database().ref('chats');
  document.querySelector('#button-submit').addEventListener('click', ()=>{
    const inputdata = document.getElementById('input').value;
    database.push(inputdata);
    alert('data inserted successfully');
  });

  // once() method
  firebase.database().ref('chats').on('value',(snapshot)=>{
    console.log(snapshot.val());
    var data= snapshot.val();
    document.getElementById("sidebar").innerHTML=data;
    alert(data)
  });



//   function get(){
//     var database = firebase.database().ref('chats');
//    // var chat_ref = database.ref('chats')
//    inputdata.on('value', function(snapshot){
//         var inputdata = snapshot.val();
//         console.log(inputdata);
//     })
//   }
//   var database = firebase.database().ref('chats');
//   database.once("value"), function (snapshot){ 
//     snapshot.forEach(function(eement){
//         console.log(element.val());
//     })
    // var inputdata = snapshot.val();
    // for(let i in inputdata){
    //     console.log(inputdata[i]);
       
    
   



//       function saveToFirebase() {

//    // var inputFieldValue = document.getElementById('myInputField').value;
//     // Get a reference to the Firebase database
//     // Save the value to a specific location in the database
//     var inputFieldValue = document.getElementById('input').value;
//     database.ref('chat/'+ 'input').set({
//       inputFieldValue: input,
//     }).then(function() {
//       console.log('Value saved successfully!');
//     }).catch(function(error) {
//       console.error('Error saving value:', error);
//     });
//     alert('saved')

//   }
</script>