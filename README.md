>[!WARNING]
> The app works over a docker container, for this is very important that you have installed Docker desktop o Docker-cli in your computer.

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
> Or change permissions on Linux with:
>```
>  chmod +x deploy.sh
>```
> use 'sudo' if is necessary. 
