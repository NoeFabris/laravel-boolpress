<template>
    <div class="card-body">

        <div>
            <h1>Vue</h1>
            <h1>{{ title }}</h1>
            <p>{{ content }}</p>
            <p>Pubblicato da: {{ name }}</p>
            <a href="{{ route('posts.show', $post->slug) }}"><button class='btn btn-info'>Dettagli</button></a>

        </div>

    </div>
</template>

<script>
export default {
    name: 'PostCard',
    proprs: {
        coverUrl: String,
        title: String,
    },
    computed: {
        img() {
            const defaultImg = ''
            // src='{{ $post->cover_url ? asset("strorage/" . $post->cover_url) : "" }}'
            return this.coverUrl ? ('storage/' + this.coverUrl) : defaultImg
        },
        contentText() {
            const maxLenght = 80


        }
    }
}
</script>