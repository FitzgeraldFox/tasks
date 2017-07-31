$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    if (localStorage.length > 0) {
        $('#clearTaskCache').fadeIn();
        $('.taskList tbody tr').each(function(i ,tr){
            console.log(localStorage.getItem('Task ' + $(tr).find('*:first-child').text()));
            if (localStorage.getItem('Task ' + $(tr).find('*:first-child').text()) != null) {
                $(tr).addClass('cached');
            }
        });
    }
});


$('#taskModalPreloader').hide();

$('#taskModal').on('show.bs.modal', function(e){
    var taskId = $(e.relatedTarget).find(':first-child').text(),
        cachedTask = localStorage.getItem('Task ' + taskId);
    if (cachedTask == null) {
        $('#taskModalPreloader').fadeIn(200);
        $.ajax({
            url: '/api/v1/task/' + taskId,
            dataType: 'json',
            success: function(response){
                localStorage.setItem(
                    "Task " + response.id, JSON.stringify({
                    'id': response.id,
                    'title': response.title,
                    'date': response.date,
                    'author': response.author,
                    'status': response.status,
                    'description': response.description
                }));
                $(e.relatedTarget).addClass('cached');
                $('#clearTaskCache').fadeIn();
                $('#taskModalLabel span').text(response.id);
                $('#taskTitleModal').text(response.title);
                $('#taskDateModal').text(response.date);
                $('#taskAuthorModal').text(response.author);
                $('#taskStatusModal').text(response.status);
                $('#taskDescriptionModal').text(response.description);
                $('#taskModalPreloader').fadeOut(200);
            }
        })
    } else {
        cachedTask = JSON.parse(cachedTask);
        $('#taskModalLabel span').text(cachedTask['id']);
        $('#taskTitleModal').text(cachedTask['title']);
        $('#taskDateModal').text(cachedTask['date']);
        $('#taskAuthorModal').text(cachedTask['author']);
        $('#taskStatusModal').text(cachedTask['status']);
        $('#taskDescriptionModal').text(cachedTask['description']);
    }
});

$('.search form').on('submit', function(e){
     e.preventDefault();
     var self = this;
    $('#taskSearchModalPreloader').fadeIn(200);
    if ($(this).find('input').val().length > 0) {
        window.location = '/search_page?str=' + $(this).find('input').val();
    } else {
        new PNotify({
            title: 'Ошибка!',
            type: 'error',
            text: "Вы не ввели строку запроса"
        });
    }
});

$('#clearTaskCache').on('click', function(e){
    e.preventDefault();
    localStorage.clear();
    $(this).fadeOut();
    $('.taskList table tr').removeClass('cached');
});