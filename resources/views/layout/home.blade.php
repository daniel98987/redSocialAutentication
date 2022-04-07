<?php
    if (isset($_GET['idAmigo'])){
        $idAmigoGrupo = $_GET["idAmigo"];
    }else{
        $idAmigoGrupo = 0;
    }
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Red social</title>

     
    <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/bootstrap/css/chat.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/personal/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <script src="{{ url('/assets/bootstrap/js/socket.io.js') }}"></script>
        @include('layout.menu')
        @include('layout.chat')
        @include('layout.amigos')
        <div class="container">
            @yield('content')
        </div>
        @include('layout.footer')
        <script>
            let ip = 'localhost';
            let port = '3000';
            let active = localStorage.getItem("active") ? localStorage.getItem("active")==='true' ? true : false : false;
            let activeClose = localStorage.getItem("activeClose") ? localStorage.getItem("activeClose")==='true' ? true : false : false;
            let activeCloseFriends = localStorage.getItem("activeCloseFriends") ? localStorage.getItem("activeCloseFriends")==='true' ? true : false : false;
            document.getElementById('button-close').click();
            var socket = io(`${ip}:${port}`);
            var socketId = '';
            var user = {!! auth()->user()->toJson() !!};
            var userPropio = user.id;
            var userAmigo = localStorage.getItem('userAmigo') ? localStorage.getItem('userAmigo') : 0;
            if(active===false){
                document.getElementById('principalChat').classList.add('change-show');
                document.getElementById('chat-content-g').classList.add('change-show');
                document.getElementById('chat-section').classList.add('change-show');
            }
            document.getElementById('button-close').addEventListener('click',()=>{
                if(active){
                    // document.getElementById('principalChat').classList.add('principal-chat');
                    document.getElementById('principalChat').classList.add('change-show');
                    document.getElementById('chat-content-g').classList.add('change-show');
                    document.getElementById('chat-section').classList.add('change-show');
                    active = false;
                    localStorage.setItem("active",active);
                }else{
                    // document.getElementById('principalChat').classList.add('principal-chat');
                    document.getElementById('principalChat').classList.remove('change-show');
                    document.getElementById('chat-content-g').classList.remove('change-show');
                    document.getElementById('chat-section').classList.remove('change-show');
                    active = true;
                    localStorage.setItem("active",active);
                }
            })
            if(!activeClose){
                document.getElementById('principalChat').classList.add('transparent');
                document.getElementById('chat-content-g').classList.add('transparent');
                document.getElementById('chat-section').classList.add('transparent');
                document.getElementById('close').classList.add('transparent');
            }else{
                document.getElementById('principalChat').classList.remove('transparent');
                document.getElementById('chat-content-g').classList.remove('transparent');
                document.getElementById('chat-section').classList.remove('transparent');
                document.getElementById('close').classList.remove('transparent');
            }
            document.getElementById('button-close-chat').addEventListener('click',()=>{
                if(activeClose){
                    document.getElementById('principalChat').classList.add('transparent');
                    document.getElementById('chat-content-g').classList.add('transparent');
                    document.getElementById('chat-section').classList.add('transparent');
                    document.getElementById('close').classList.add('transparent');
                }else{
                    document.getElementById('principalChat').classList.remove('transparent');
                    document.getElementById('chat-content-g').classList.remove('transparent');
                    document.getElementById('chat-section').classList.remove('transparent');
                    document.getElementById('close').classList.remove('transparent');
                }
                localStorage.setItem("activeClose",!activeClose);
            })

            if(!activeCloseFriends){
                document.getElementById('principalChatAmigos').classList.add('change-show');
            }
            document.getElementById('button-close-amigos').addEventListener('click',()=>{
                if(activeCloseFriends){
                    document.getElementById('principalChatAmigos').classList.add('change-show');
                }else{
                    document.getElementById('principalChatAmigos').classList.remove('change-show');
                }
                activeCloseFriends = !activeCloseFriends;
                localStorage.setItem("activeCloseFriends",activeCloseFriends);
            })

            window.addEventListener('load',()=>{
                // document.getElementById('principalChat').classList.remove('principal-chat');
                const chat = document.getElementById("chat-content-g");
                const messageChat = document.getElementById("chat-content");
                new Promise((resolve,reject)=>{
                    resolve(
                        setTimeout(()=>{chat.scrollTo(0, messageChat.scrollHeight)},1000)
                    )
                })
            });
            
            socket.on('connection');
            chatInput.addEventListener('keyup',(e)=>{
                let message = e.target.value;
                if(e.which === 13 && !e.shiftKey){
                    socket.emit('sendChatToServer',message)
                    e.target.value = "";
                    return false
                }
            })
            socket.emit('connectDataClient',{
                userPropio: userPropio,
                userAmigo: Number(userAmigo)
            })
            socket.on('idSocket',async (id)=>{
                socketId = await id;
                console.log("socketId",socketId)
                socket.on(id,(res)=>{
                    const messageChat = document.getElementById("chat-content");
                    var p = document.createElement('li');
                    if(res.id===userPropio){
                        p.className += 'propio';
                    }else{
                        p.className += 'amigo';
                    }
                    p.innerText = res.message;
                    messageChat.appendChild(p);
                    const chat = document.getElementById("chat-content-g");
                    chat.scrollTo(0, messageChat.scrollHeight);
                })
            })
            document.getElementById("send").addEventListener("click",()=>{
                let message = document.getElementById("chatInput");
                socket.emit('sendChatToServer',message.value)
                message.value = "";
                return false
            })
            function openChat(id) {
                localStorage.setItem("activeClose",true);
                localStorage.setItem("active",true);
                var a = document.createElement("a");
                a.href = `/grupos?idAmigo=${id}`;
                localStorage.setItem("userAmigo",id)
                // document.getElementById('principalChat').classList.remove('change-show');
                // document.getElementById('chat-content-g').classList.remove('change-show');
                // document.getElementById('chat-section').classList.remove('change-show');
                // active = true;
                // console.log(window.location);
                document.getElementById('chat-content').innerHTML = "";
                a.click();  
            }
        </script>
    </body>
</html>
