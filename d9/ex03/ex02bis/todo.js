$('document').ready(function() {
    // Загружаем ранее созданные события ToDo из cookies
    var myCook = document.cookie.split(';');
    if (myCook[0]) {
        var arr;
        var i = myCook.length - 1;
        for (i; i >= 0; i--) {
            var arr = myCook[i].split('=');
            $('#ft_list').append('<div name="' + arr[0] + '" class="to_do" onclick="delete_todo(this)">' + decodeURIComponent(arr[1]) + '</div>');
        }
    }
    // Добавляем новый ToDo
    $('#new_todo').click(function() {
        var todo_str = prompt('Do you want to create new element? Enter the title: ');
        if (todo_str == null || todo_str == false)
            return;
        $('#ft_list').prepend('<div class="to_do" onclick="delete_todo(this)">' + todo_str + '</div>');

        // Сохраняем изменения в coockie
        setCookie(Math.floor(Math.random() * (100000 + 1)), encodeURIComponent(todo_str), 2);
    });
});

function delete_todo(param) {
    if (confirm('Are you sure you want to delete this task?')) {
        $(param).remove();
        setCookie($(param).attr("name"), encodeURIComponent($(param).html()), -1);
    }
}

function setCookie(cname, cvalue, exdays) {
    var date = new Date();
    date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}