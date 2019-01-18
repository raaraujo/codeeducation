@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h3>Dados do Usuário</h3>
        <div class="row">
            <?php $iconEdit = Icon::create('pencil');?>
            {!! Button::primary($iconEdit)->asLinkTo(route('admin.users.edit', ['user' => $user->id])) !!}
            <?php $iconDestroy = Icon::create('trash');?>
            {!! Button::danger($iconDestroy)
                ->asLinkTo(route('admin.users.destroy', ['user' => $user->id])) 
                ->addAttributes(['onclick'=>"event.preventDefault();document.getElementById(\"form-delete\").submit();"])    
            !!}
            <?php $formDelete = FormBuilder::plain([
                'id'=>'form-delete',
                'route'=>['admin.users.destroy', 'user'=>$user->id],
                'method'=>'DELETE',
                'style'=>'display:none'
            ])?>
            {!! form($formDelete) !!}
        </div>
        <?php $icon = Icon::create('pencil');?>
        <br>
        <div class="row">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>

</div>
@endsection

