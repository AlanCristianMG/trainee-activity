>[!WARNING]
> The app works over a docker container, for this is very important that you have installed the next requirements:
> * Git
> * Docker desktop or Docker-cli
> * Docker-compose

>[!NOTE]
> ## Steps to deploy app
> * For Windows:
>   1. Open a powershell terminal in the directory that you want have the project
>   3. Clone the repository:
>   ```
>   git clone https://github.com/AlanCristianMG/trainee-activity.git
>   cd trainee-activity
>   ./deploy.ps1
>   ```
> * For Linux:
>   1. Open a powershell terminal in the directory that you want have the project
>   3. Clone the repository:
>   ```
>   git clone https://github.com/AlanCristianMG/trainee-activity.git
>   cd trainee-activity
>   ./deploy.sh
>   ```
>   

>[!IMPORTANT]
>
> If you have problems with the script './deploy.ps1' or '.deploy.sh', you need change the ExecutionPolicy in Windows with:
> ```
>  Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
> ```
> if the problem persist try with:
> ```
> Set-ExecutionPolicy Unrestricted -Scope CurrentUser
>```
>
> 
> Or change permissions on Linux with:
>```
>  chmod +x deploy.sh
>```
> use 'sudo' if is necessary. 


>[!NOTE]
>
> *Documentation*
> 
> [Documentación Técnica](https://docs.google.com/document/d/1QSqZRzW5bpm9s8xCde1GL_0BYmJz6tFKuO7RF4prHRU/edit?usp=sharing)

