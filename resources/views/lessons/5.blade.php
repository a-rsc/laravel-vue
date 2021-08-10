@extends('layouts.app')

@section('title', 'Ciclo de vida')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>Ciclo de vida</h1>
        <h2>@{{ message }}</h2>
        <input type="text" id="message" v-model="message">
        <!-- <input type="button" v-on:click="handleClick" value="Destroy"> -->
        <input type="button" v-on:click="handleClick" value="Destroy">
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            message: '¡Hi, Vue!'
        },
        beforeCreate() {
            console.log('beforeCreate');
        },
        created() {
            console.log('created');
        },
        beforeMount() {
            console.log('beforeMount');
        },
        mounted() {
            console.log('mounted');
        },
        beforeUpdate() {
            console.log('beforeUpdate');
        },
        updated() {
            console.log('updated');
        },
        beforeDestroy() {
            console.log('beforeDestroy');
        },
        destroyed() {
            console.log('destroyed');
        },
        methods: {
            handleClick: function() {
                app.$destroy();
            }
        }
    });
    document.getElementById('message').focus();
</script>
@endsection
