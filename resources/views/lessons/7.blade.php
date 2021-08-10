@extends('layouts.app')

@section('title', 'Watch')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div id="app" class="flex-item flex-item-content">
            <h1>Watch</h1>
            <h2>@{{ message }}</h2>
            <input type="text" id="message" v-model="message">
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        // data() {
        //     return {message: '¡Hi, Vue!'}
        // },
        data: {
            message: '¡Hi, Vue!'
        },
        watch: {
            message: function (newValue, oldValue){
                console.log('newValue => "' + newValue + '", oldValue => "' +  oldValue + '"');
            }
        }
    });
    document.getElementById('message').focus();
</script>
@endsection
