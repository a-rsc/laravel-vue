@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div id="fruits">
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <input type="text" id="newFruit" v-model="newFruit" v-on:keyup.enter="onEnterPressed" placeholder="nueva fruta">
            <ul>
                <li v-for="product in shoppingList">@{{ product }}</li>
            </ul>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Otra situación típica en la creación de nuevas interfaces de usuario es la enumeración de elementos dentro de una lista. Para ello en Vue se utiliza la directiva <strong>v-for</strong> a la que se le pasa una colección de elementos que se representarán dentro del bloque.</p>
            <p>Con la propiedad definida sólo nos resta indicar mediante la directiva <strong>v-for</strong> que iteramos cada producto de nuestra lista de la compra y renderizamos cada elemento &lt;li&gt;</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        beforeCreate() {
            // this.title = document.getElementsByTagName('title')[0].innerText;
        },
        created() {
            var url = window.location.pathname;
            var filename = url.substring(url.lastIndexOf('/')+1); // url filename

            // filename = filename.split('.').slice(0, -1).join('.'); // extension
            // filename = filename.substring(filename.lastIndexOf('-')+1); // lesson

            // console.log(filename);
            this.lesson = `Lección ${filename}`;
        },
        beforeMount() {
            document.getElementsByTagName('title')[0].innerText = this.title;
        },
        mounted() {
            document.getElementById('newFruit').focus();
        },
        data: {
            title: 'Listas',
            subtitle: 'Renderizado de listas',
            lesson: '',
            newFruit: '',
            shoppingList: ['manzana', 'pera', 'plátano', 'kiwi', 'melón', 'uva', 'cereza']
        },
        methods: {
            onEnterPressed() {
                let error = document.getElementById('error');

                if (this.newFruit.trim() != '') {
                    if (!this.shoppingList.includes(this.newFruit)) {
                        this.shoppingList.push(this.newFruit);
                        this.newFruit = '';

                        if (error){
                            error.parentNode.removeChild(error);
                        }
                    } else {

                        if (!error) {
                            let div = document.createElement('div');
                            div.id = 'error';
                            div.style.color = 'red';
                            div.innerHTML = '<p>Esta fruta ya se encuentra en la lista</p>';
                            document.getElementById('fruits').appendChild(div);
                        }
                    }
                } else {
                    this.newFruit = '';
                }
            }
        }
    });
</script>
@endsection
