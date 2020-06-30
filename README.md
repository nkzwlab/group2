# group2
ウェブサービスを作ってみようの課題

# 手順
## dockerを入手
```
brew cask install docker
```
## つかいかた
クローンする。
```
cd group2
docker-compose up -d
```
docker-composeをinstallする
```
sudo curl -L "https://github.com/docker/compose/releases/download/1.26.0/docker-compose-$(uname -s)-$(uname -m)"  -o /usr/local/bin/docker-compose
sudo mv /usr/local/bin/docker-compose /usr/bin/docker-compose
sudo chmod +x /usr/bin/docker-compose
```
のあと
```
http://localhost:8080
```
で最初のページにアクセス可。
```
cd group2
docker-compose down
```
で終了。
