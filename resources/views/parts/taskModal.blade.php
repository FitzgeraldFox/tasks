<div class="modal fade taskModal" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div id="taskModalPreloader">
                <img src="{{ asset('img/preloader.gif') }}" alt="">
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="taskModalLabel">Информация о задаче №<span></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="taskInfoItem">
                    <label for="taskTitleModal">Заголовок</label>
                    <p id="taskTitleModal" class="taskInfoText"></p>
                </div>
                <div class="taskInfoItem">
                    <label for="taskDateModal">Дата выполнения</label>
                    <p id="taskDateModal" class="taskInfoText"></p>
                </div>
                <div class="taskInfoItem">
                    <label for="taskAuthorModal">Автор</label>
                    <p id="taskAuthorModal" class="taskInfoText"></p>
                </div>
                <div class="taskInfoItem">
                    <label for="taskStatusModal">Статус</label>
                    <p id="taskStatusModal" class="taskInfoText"></p>
                </div>
                <div class="taskInfoItem">
                    <label for="taskDescriptionModal">Описание</label>
                    <p id="taskDescriptionModal" class="taskInfoText"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>