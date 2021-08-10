@extends('layouts.app')

@section('title', 'Computed properties')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/8a.css') }}">
@endpush

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>Computed properties</h1>

        <div class="operation">
            <input type="text" id="operator1" v-model="operator1"><span class="operating">+</span>
            <input type="text" id="operator2" v-model="operator2"><span>= @{{ resultSum }}</span>
        </div>
        <div class="operation">
            <input type="text" id="operator3" v-model="operator3"><span class="operating">-</span>
            <input type="text" id="operator4" v-model="operator4"><span>= @{{ resultSub }}</span>
        </div>

        <p>Para evitar este recálculo haremos uso de las computed properties simplemente sustituyendo el bloque de methods por un bloque computed y cambiar las llamadas para el cálculo de los resultados como si fueran propiedades de la instancia.</p>

        <h2>Definición de propiedades computadas</h2>
        <p>Dentro de una instancia Vue además de las propiedades se exponen métodos que operan sobre los datos o ejecutan acciones. Los métodos se ejecutan cada vez que las invocamos, cosa que no ocurre con las propiedades computadas, ejecutadas cada vez que alguna de las variables utilizadas en la obtención de un resultado en las propiedades computadas cambia su valor; en dicho caso se ejecutaría la propiedad, para recalcular.</p>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            title: 'Calculator',
            operator1: 0,
            operator2: 0,
            operator3: 0,
            operator4: 0
        },
        computed: {
            resultSum() {
                let op1 = parseInt(this.operator1 === '' ? '0' : this.operator1);
                let op2 = parseInt(this.operator2 === '' ? '0' : this.operator2);
                console.log('resultSum()');
                return op1+op2;
            },
            resultSub() {
                let op3 = parseInt(this.operator3 === '' ? '0' : this.operator3);
                let op4 = parseInt(this.operator4 === '' ? '0' : this.operator4);
                console.log('resultSub()');
                return op3-op4;
            }
        }
    });
    document.getElementById('operator1').focus();
</script>
@endsection
