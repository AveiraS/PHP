window.onload = function() {
    // Загружаем ранее созданные события ToDo из cookies
    var myCook = document.cookie.split(';');
    if (myCook[0]) {
        var ft_list = document.getElementById('ft_list');
        var arr;
        var i = myCook.length - 1;
        for (i; i >= 0; i--) {
            arr = myCook[i].split('=');
            ft_list.innerHTML += '<div name="' + arr[0] + '" class="to_do" onclick="delete_todo(this)">' + decodeURIComponent(arr[1]) + '</div>';
        }
    }
    // Добавляем новый ToDo
    document.getElementById('new_todo').onclick = function() {
        var todo_str = prompt('Do you want to create new element? Enter the title: ');
        if (todo_str == null || todo_str == false)
            return;
        var ft_list = document.getElementById('ft_list');
        var todos = document.getElementsByClassName("to_do");
        if (todos) {
            var new_todo = document.createElement('div');
            var text_node = document.createTextNode(todo_str);
            new_todo.appendChild(text_node);
            new_todo.classList.add('to_do');
            new_todo.setAttribute('onclick', 'delete_todo(this)');
            ft_list.insertBefore(new_todo, todos[0]);
        } else
            ft_list.innerHTML += '<div class="to_do" onclick="delete_todo(this)">' + todo_str + '</div>';
        // Сохраняем изменения в coockie
        var fist = document.getElementById('ft_list').children;
        setCookie(Math.floor(Math.random() * (100000 + 1)), encodeURIComponent(todo_str), 2);
    }
}

// Удаление ToDo
function delete_todo(param) {
    if (confirm('Are you sure you want to delete this task?')) {
        var task = document.getElementById('ft_list');
        task.removeChild(param);
        setCookie(param.getAttribute("name").trim(), encodeURIComponent(param.innerHTML), -1);
    }
}

function setCookie(cname, cvalue, exdays) {
    var date = new Date();
    date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}