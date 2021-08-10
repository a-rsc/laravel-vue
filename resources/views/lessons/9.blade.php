@extends('layouts.app')

@section('title', 'Métodos')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>@{{ showMessage() }}</h1>
        <button type="button" v-on:click="showMessage">Mostrar título</button>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Estos métodos se declaran dentro del blqoue methods en la instancia, y se pueden asociar a los elementos HTML de la instancia.</p>
            <p>En este ejercicio vamos a relacionar un componente de tipo botón con una acción que corresponde con un métdoo declarado en la instancia. Para indicar esta relación usamos la directiva v-on que se coloca dentro del HTML del botón y el evento (en este caso del evento de click).</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            title: 'Métodos',
            subtitle: 'Operando con las propiedades',
            lesson: 'Lección 09',
            message: 'Hi, VueJs!'
        },
        methods: {
            showMessage() {
                console.log('Showing message: ' + this.message + ' Let\'s learn!');
                return this.message + ' Let\'s learn!';
            }
        }
    });
</script>
@endsection
