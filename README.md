# php-slim-guzzle-docker
This is a php web application to retrieve events data via REST API from other system which its code is in https://github.com/ssupattra/java-spring-docker.

## Technology
PHP, slim, guzzle (REST API), composer, Docker

## Installation
1. Download this code
2. To run in local machine, use Dockerfile.dev that needs to update in docker-compose.yml
3. Ensure you run web application from this code, https://github.com/ssupattra/java-spring-docker
4. In termimal, run 'docker-compose up' and Open browser http://localhost:8000
5. Or: 
'docker build .',
'docker run -p 8080:80 [number]' and open browser, http://localhost:8080

Note: use .travis.yml to build docker image (from Dockerfile) and upload to docker hub, then deploy to AWS beanstalk.
