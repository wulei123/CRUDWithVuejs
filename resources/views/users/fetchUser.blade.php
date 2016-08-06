@extends('layout')
@section('content')



    <div id="UserController">
        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.name">Name field is required</li>
                <li v-show="!validation.email">Input a valid email address</li>
                <li v-show="!validation.address">Address field is required</li>
            </ul>
        </div>
        <form action="#" @submit.prevent="AddNewUser" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input v-model="newUser.name" type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input v-model="newUser.email" type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input v-model="newUser.address" type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New User</button>
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-show="edit" @click="EditUser(newUser.id)">Edit newUser</button>
            </div>
        </form>
        <div class="alert alert-success" transition="success" v-if="success">Add new users successfully</div>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>ADDRESS</th>
        <th>CREATED_AT</th>
        <th>UPDATED_AT</th>
        </thead>

        <thead>
        <tr v-for="user in users">
            <td>@{{ user.id }}</td>
            <td>@{{ user.name }}</td>
            <td>@{{ user.email }}</td>
            <td>@{{ user.address }}</td>
            <td>@{{ user.created_at }}</td>
            <td>@{{ user.updated_at }}</td>
            <td>
                <button class="btn btn-default btn-sm" @click="ShowUser(user.id)">Edit</button>
                <button class="btn btn-danger btn-sm" @click="DeleteUser(user.id)">Remove</button>
            </td>
        </tr>
        </thead>
    </table>

    </div>




    @endsection
    @push('scripts')
    <script src="/js/script.js"></script>
<style>
    .success-transition{
        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        -ms-transition: all .5s;
        -o-transition: all .5s;
        transition: all .5s;
    }
    .success-enter,.success-leave{
        opacity:0;
    }
</style>
    @endpush
