@extends('layouts.app')

@section('title', 'Componentes de la instancia')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>@{{ message }}</h1>
        <h2 ref="mySubtitle"></h2>
        <h2 ref="mySubtitle2"></h2>
        <button type="button" v-on:click="clickedButton">Click me!</button>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Una instancia se compone de:</p>
            <ul>
                <li>$el: objeto componente HTML al que está asociado mediante el id correspondiente.</li>
                <li>$data: objeto que contiene las propiedades de la instancia.</li>
                <li>$refs: objeto donde se registran los elementos marcados con el atributo ref.</li>
            </ul>
            <p>El contenido de $el es efectivamente el objeto que contiene la definición del HTML de nuestra instancia.</p>
            <p>Dentro de $refs tenemos un objeto con los elementos marcados con el atributo ref en el HTML de nuestra instancia, en este caso son dos elementos h2 (mysubtitle y mysubtitle2).</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            title: 'Componentes de la instancia',
            subtitle: 'Instancia Vue',
            lesson: 'Lección 10',
            message: 'Elementos de la instancia Vue'
        },
        beforeCreate() {
            console.log('beforeCreate');
        },
        created() {
            console.log('created');
        },
        beforeMount() {
            console.log('beforeMount');
            // console.log(this.$el.innerHTML);
            // console.log(this.$data);
            // console.log(this.sayHi());
            // console.log(this.$refs);
        },
        mounted() {
            console.log(this.$el.innerHTML);
            console.log(this.$data);
            console.log(this.sayHi());
            console.log(this.$refs);
        },
        methods: {
            sayHi() {
                return 'Hi!!!';
            },
            clickedButton() {
                this.$refs.mySubtitle.innerText = '100 ejercicios';
                this.$refs.mySubtitle.style.color = 'red';

                this.$refs.mySubtitle2.innerText = 'para aprender Vue';
                this.$refs.mySubtitle2.style.color = 'blue';

                console.log(
                    [this.$refs.mySubtitle.innerText, this.$refs.mySubtitle2.innerText].join(' ')
                );
            }
        }
    });
</script>
@endsection
