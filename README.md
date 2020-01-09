# Markdown Slides


## Online Presentations:
    
- [PHP单元测试](https://slides.fatindeed.com/phpunit-tutorial/)


## Docker host:

1. Clone this repository.
2. Enter repository directory.
3. Execute following command:

    ```sh
    docker run --rm -v="$PWD":/var/www/html \
        -v="$PWD"/nginx.conf:/etc/nginx/conf.d/default.conf \
        -p 8000:80 nginx:alpine
    ```

    *Replace 8000 with any port you want*