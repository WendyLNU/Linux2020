添加登录启动功能
git clone https://github.com/GeekCloud-Team/login-shell.git

cd login-shell

mv motd.sh /etc/

chmod 755 /etc/motd.sh

echo 'sh /etc/motd.sh' >> /etc/profile
