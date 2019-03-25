
## centos7下配置golang开发环境
下载地址 https://studygolang.com/dl

1. 下载centos系统所用的版本
    ```text
     wget https://studygolang.com/dl/golang/go1.12.1.linux-arm64.tar.gz
    ```
2. 解压并创建工作目录
   ```text
   tar -zxf go1.12.1.linux-arm64.tar.gz -C /usr/local/src
   mkdir /home/gopath
   ```
    
3. 设置环境变量,修改 `/etc/profile` 文件,添加
    ```text
    export GOROOT=/usr/local/src/go 
    export GOBIN=$GOROOT/bin
    export GOPKG=$GOROOT/pkg/tool/linux_amd64 
    export GOARCH=amd64
    export GOOS=linux
    export GOPATH=/home/gopath
    export PATH=$PATH:$GOBIN:$GOPKG:$GOPATH/bin
    ```
    再执行
     ```text
     source /etc/profile 
    ```
    命令使新的环境变量生效
4. 检查安装是否成功，打开命令行程序，输入
    ```text
    go version
    ```
   出现 `go version go1.12 windows/amd64` 则安装成功
         
5. 执行下面命令下载 masterlab_socket 源码并编译运行,
    ```
    cd /home/gopath
    mkdir /home/gopath/src
    cd /home/gopathsrc
    git clone https://github.com/gopeak/masterlab_socket.git
    cd masterlab_socket
    go build
   ./masterlab_socket
    ```

 6. good luck ~~

 
