
## windows下搭建golang开发环境
1. 下载对应操作系统的版本并安装，如 windows-64位版本。
https://studygolang.com/dl/golang/go1.12.1.windows-amd64.msi
2. 打开此MSI文件 并跟随提示来安装Go工具。默认情况下，该安装程序会将Go放置在 c:\Go 目录中。
   此安装程序自动配置了GOROOT、GOBIN两个环境变量。
   ```text
   GOROOT 变量是golang安装后的根目录，如 c:/Go  
   GOBIN 变量是golang安装后根目录下的bin目录，即 GOROOT/bin/
   ```
    
3. 还要手动配置一个`GOPATH` 环境变量,手动创建一个目录如 `c:/gopath`,并加入到环境变量中
    ```text
    GOPATH : 是golang的工作目录，也是用来设置包加载路径的重要变量，也是go get和go install工具将会使用的目录
    ```
   环境变量设置如下图：
   ![](http://www.masterlab.vip/docs/images/masterlab_socket/go_path.png)      

4. 检查安装是否成功，打开命令行程序，输入
    ```text
    go version
    ```
   出现 `go version go1.12 windows/amd64` 则安装成功
         
5. 执行下面命令下载 masterlab_socket 源码并编译运行,
    ```
    cd c:/gopath
    mkdir c:/gopath/src
    cd c:/gopath/src
    git clone https://github.com/gopeak/masterlab_socket.git
    cd masterlab_socket
    
    go build
    masterlab_socket.exe
    ```

 6. good luck ~~

 
