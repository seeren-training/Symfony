
Controller/
    Post/           
        - PostController
            showAll: /
            show: /post/{id}
            new: /post/new
        
        - VoteController
            down: post/{id}/vote/down
            up: post/{id}/vote/up
            show: post/{id}/vote

        - CommentController
            showAll: post/{id}/comments
            new: post/{id}/comment/new

    - UserController
        new: user/new
        login: /login
        logout: /logout

    - SearchController
        results: /search/{query}
        resultsByDate: /search/{query}/{date}
        resultsByTheme: /search/{query}/{theme}
