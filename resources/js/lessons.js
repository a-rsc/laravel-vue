const lessons = new Vue({
    el: '#lessons',
    data: {
        lessons: [
            {num: 1, title: 'JSfiddle.net', file: 'http://jsfiddle.net/a_rsc/eg76axmy/4/'},
            {num: 2, title: '¡Hi, Vue!', file: 2},
            {num: 3, title: 'Instancia Vue', file: 3},
            {num: 4, title: 'Instancias Vue', file: 4},
            {num: 5, title: 'Ciclo de vida', file: 5},
            {num: 6, title: 'Data binding', file: 6},
            {num: 7, title: 'Watch', file: 7},
            {num: '8a', title: 'Computed properties', file: '8a'},
            {num: '8b', title: 'Computed properties / methods', file: '8b'},
            {num: 9, title: 'Métodos', file: 9},
            {num: 10, title: 'Componentes de la instancia', file: 10},
            {num: 11, title: 'Eventos', file: 11},
            {num: 12, title: 'Renderizar HTML', file: 12},
            {num: 13, title: 'Vincular propiedades', file: 13},
            {num: 14, title: 'Condicionales', file: 14},
            {num: 15, title: 'Listas', file: 15},
            {num: 16, title: 'Enumeración de propiedades', file: 16},
            {num: 17, title: 'Filtros', file: 17},
            {num: 18, title: 'Renderizar sólo una vez', file: 18},
            {num: 19, title: 'Mouse move', file: 19},
            {num: 20, title: 'Directivas personalizadas', file: 20},
            {num: 21, title: 'Directivas personalizadas II', file: 21},
            {num: 22, title: 'Directivas personalizadas III', file: 22},
            {num: 23, title: 'Directivas personalizadas IV', file: 23},
            {num: 24, title: 'Componente', file: 24},
            {num: '24component', title: 'Componente', file: '24component'},
            {num: 25, title: 'Componente parametrizables', file: 25},
            {num: 26, title: 'Componente tipo propiedades', file: 26},
            {num: 27, title: 'Cambiar valor de props', file: 27},
            {num: 28, title: 'Reactividad Data', file: 28},
            {num: 30, title: 'Directiva v-show vs v-if', file: 30},
            {num: 31, title: 'Bucle v-for y key', file: 31},
            {num: 32, title: 'Bucle atributos y rango', file: 32},
            {num: '33a', title: 'Peticiones Fetch', file: '33a'},
            {num: '33b', title: 'Peticiones Fetch / Async', file: '33b'},
            {num: 34, title: 'Contexto this', file: 34},
            {num: 35, title: 'Promesas', file: 35},
            {num: 36, title: 'Conjunto de promesas', file: 36},
            {num: 37, title: 'Inline templates', file: 37},
        ]
    },
    methods: {
        getTextContent(lesson) {
            return `Lección ${lesson.num}: ${lesson.title}`;
        }
    }
});
