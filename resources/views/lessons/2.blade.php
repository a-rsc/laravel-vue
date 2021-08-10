@extends('layouts.app')

@section('title', 'Configurar el entorno')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>@{{  message  }}</h1>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                message: '¡Hi, Vue!'
            }
        }
    });
</script>
@endsection
