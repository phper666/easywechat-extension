# easywechat-extension
扩展easywechat，主要是针对easywechat不及时更新版本时，可以自主扩展微信的api接口

### 问题
最近开发遇到了一个问题，使用easywechat包时，有些微信接口没有，需要自行扩展这些接口。原来有想过fork easywechat的包来扩展，但是这样不好的是，每次easywechat版本发布都需要去查看该本版有什么改动，然后再修改到自己fork的easywechat包。最近去看了下easywechat的源码包，发现可以不改动easywechat包的情况下扩展微信的接口。

### 如何扩展接口
1、继承easywechat原有的工厂类，自己自定义一个方法来实例化你扩展的接口，比如我自定义了一个customMake来实例化扩展的企业微信外部联系人标签接口    

2、扩展接口，比如现在easywechat没有企业微信外部联系人标签的接口，但是有外部联系人的一些其他接口了，所有我找到了企业微信Work/ExternalContact下外部联系人的接口，然后扩展一个CorpTag类，这个类封装了所有企业微信外部联系人的标签操作接口  

3、提供你的扩展接口，如果你看easywechat的源码，你会发现每种类型接口下都有一个ServiceProvider.php的类，这个类就是用来注册你封装好的接口。因为我扩展的外部联系人企业标签接口原来已经有了一些接口，所以我需要重写这个ServiceProvider类下的register方法来注册接口，实际只有一个方法，你可以继承ServiceProvider，然后重写register方法，也可以重新写一个新的ServiceProvider类，目前我是新写一个ServiceProvider   

4、easywechat支持微信多种类型接口，比如微信公众号、微信小程序、企业微信、开放平台等，你需要找到需要扩展的接口类型，继承该类型下的Application类，然后重写$providers属性，该属性是会实例化填写的所有的ServiceProvider驱动,比如我刚刚新增了一个\Phper666\EasywechatExtension\Work\ExternalContact\ServiceProvider驱动来加载接口，所以我要把它旧的\EasyWeChat\Work\ServiceProvider驱动删掉，写上自己新增的ServiceProvider驱动，这样就能使用自己扩展的接口了，easywecaht原有的驱动不要删除，直接复制上去，删掉你要扩展的驱动就行。这样也完全不用担心easywechat升级版本了，我们只需要维护自己扩展的接口就行，easywechat新增什么我们更新后照样能用    

5、使用扩展接口   
```
// 使用原来的easywechat接口：
$config = []; // 自行写上自己的配置
$app = Factory::work($config); // 可以继续请求easywechat封装好的接口

// 使用自己扩展的接口(包含了easywechat的原有接口)
$app = Factory::customMake('Work', $config);
$app->corp_tag->getCorpTagList(); // 这里就能拿到了外部联系人企业标签的列表
```

6、自己维护扩展包   
如果你要自己维护一个扩展包，你需要修改几个地方，
1、先拉取项目   
```
git clone https://github.com/phper666/easywechat-extension.git
```
2、修改Phper666\EasywechatExtension\Factory下的customMake方法，把里面的命名空间改为你的命名空间  
 
3、全局修改该包的命名空间，把Phper666\EasywechatExtension命名空间修改为你的命名空间   

4、修改composer.json文件，把里面的命名空间改为你的命名空间     


如果有更好的扩展方法欢迎交流下~~
