<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';


?>

<div class="main-div">
    <div class="header">Основные настройки</div>
    <div id="term">
    <label>№Терминала</label>
        <input id="terminal" value="1" class="form-control" />
    </div>

    <div class="select-command">
        <select id="command" class="form-control">
        <?php foreach ($model as $item): ?>
            <option value="<?= $item['id'] ?>" data-raw='<?= $item['RawData'] ?>' data-token="<?= $item['token'] ?>"><?= $item['name'] ?></option>
        <?php endforeach; ?>
        </select>
    </div>

</div>

<div id="out"></div>
<button id="send" class="btn btn-outline-info send">Отправить</button>

<table id="result-table" class="table" style="margin-top: 2rem">
    <thead>
    <tr>
        <td>№</td>
        <td>Дата и время</td>
        <td>Команда</td>
        <td>Параметр 1</td>
        <td>Параметр 2</td>
        <td>Параметр 3</td>
        <td>Статус</td>
    </tr>

    </thead>
    <tbody>
    </tbody>
</table>