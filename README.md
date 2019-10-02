# TranslateApp

`Installation`

At the root directory of the project, run

**docker-compose up -d --build**

After that all of our containers will be up.

For getting inside of the php container, run

**docker exec -it tk-phpfpm bash**

Inside of the php container, run

**composer install**

After all the necessary modules install application will be ready.

Application will run on http://127.0.0.1 at 80 port.
