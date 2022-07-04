@if ($paginator->hasPages())
    @if ($paginator->hasMorePages())
        <button class="btn-info" onclick="showNextPage(this)" data-url="{{ $paginator->nextPageUrl() }}">
            Load More ...
        </button>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var showNextPage = function(button) {
            var url = button.dataset.url
            axios.get(url)
                .then(function(response) {
                    // handle success
                    deploy(response.data.data);
                    if (!response.data.next_page_url){
                        button.parentElement.classList.add('hidden')
                    }
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
        }

        var deploy = function(articles) {
            var target = document.getElementById('article-container')

            for (var i = 0; i < articles.length; i++) {
                target.insertAdjacentHTML('beforeend',
                    /* html */
                    `
                    <a class="article-link" href="${'/articles/' + articles[i]['slug']}">
                        <article class="article">
                            <img class="article-image" src="${articles[i]['thumbnail_url']}" alt="${articles[i]['title']}">
                            <h2 class="article-title">${articles[i]['title']}</h2>
                            <p class="article-info">${articles[i]['user']['profile']['full_name']} &bull;
                                ${articles[i]['creation_date']}</p>
                            <p class="article-excerpt">${articles[i]['excerpt']}</p>
                            <span class="article-category">${articles[i]['category']['name']}</span>
                        </article>
                    </a>
                    `
                    /* endhtml */
                )
            }
        }
    </script>
@endif
