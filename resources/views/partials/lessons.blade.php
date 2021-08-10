<hr>
    <div id="lessons" class="lesson">
        <h1>Aprender VueJS</h1>
        <ul>
            <li v-for="(lesson, index) in lessons">
                <a v-bind:href="lesson.file" v-bind:class="index % 2 == 0 ? 'red': 'blue'" v-bind:title="lesson.title">@{{ getTextContent(lesson) }}</a>
            </li>
        </ul>
    </div>
