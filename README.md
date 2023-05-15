## ****Docker Web Stack****

> A simple docker container to run local development server for PHP, Nodejs, Python or Go projects

Installation:
1. Install Docker on your local machine
2. Clone this repository
3. Open `Terminal/Command Prompt/PowerShell` and change directory into cloned repository directory
4. Run `docker compose up` or with `--build` to re-built the containers
5. Once the docker containers run:
	- Express Mongo available at http://127.0.0.1:8081/
	- Main container for workspace is **`docker-web-stack`**
	- You can enter  **`docker-web-stack`** shell by execute this command, `docker exec -it docker-web-stack /bin/sh`
	- Once **`docker-web-stack`** shell can be accessed, execute `php -S 0.0.0.0:5000 -t /home/web/tools` to start local apps(PHPInfo, Adminer and Test Services). Visit http://127.0.0.1:5000/ to access those apps
6. **`docker-web-stack`** container only expose ports `5000` to `5050`
7. Folder `web` mounted to `docker-web-stack` container. The path to `web` folder inside the container is `/home/web`

Supported Modules:
- PHP v8.2.4
- Nodejs v19.9.0
- Python v3.11.3
- Go v1.20.3
- Postgres v15.2
- MariaDB v10.6.12
- MongoDB v6.0.5
- Memcached v1.6.18
- Redis v7.0.5
- Mongo Express
- Adminer
- Composer
- NPM
- Yarn
- Pip

Requirements:
- Linux/Windows/Mac
- Knowledge about basic Unix-like operating system commands

Notes:
- Refer [test_services.php](https://github.com/arma7x/docker-web-stack/blob/master/web/tools/test_services.php) for connection configuration to other services
- Folder `data` contains persistent data for Mariadb, MongoDB,  Postgres  and Redis
- `.env` contains default environment configuration
