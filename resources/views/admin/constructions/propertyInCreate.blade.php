<div class="box">
    {!! Form::open(['route' => 'storePropInCreate']) !!}
    <div class="box-body">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Название</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите свойство" name="title">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-success pull-right">Добавить</button>
    </div>
    {!! Form::close() !!}
</div>