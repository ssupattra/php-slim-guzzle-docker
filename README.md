# php-slim-guzzle-docker
This is a php web application to retrieve events data via REST API from other system which its code is in https://github.com/ssupattra/java-spring-docker.

## Technology
PHP, slim, guzzle (REST API), composer, Docker

## Installation
1. Download this code
2. To run in local machine, use Dockerfile.dev that needs to update in docker-compose.yml
3. Ensure you run web application from this code, https://github.com/ssupattra/java-spring-docker
4. Update Model/Event.php to have url of web application from step 3
5. In termimal, run 'docker-compose up' and Open browser ```http://localhost:8000```
6. Or: 
'docker build .',
'docker run -p 8080:80 [number]' and open browser, ```http://localhost:8080```

### AWS setup
1. Set up web server by using aws beanstalk > create a web server environment, Platform: docker
2. Update aws configuration to .travis.yml eg. aws bucket name
3. Travis with .travis.yml will build docker image (from Dockerfile) and upload to docker hub, then deploy to AWS beanstalk

