php-patterns
============

design patterns in PHP

* singleton
* adapter
* facade
* bridge
* observer
* proxy

# 參考網頁

http://openhome.cc/Gossip/DesignPattern/
良葛格的設計模式

http://coolshell.cn/articles/8961.html
Coolshell 設計模式經驗分享

http://en.wikipedia.org/wiki/Category:Software_design_patterns
維基設計模式頁面

https://github.com/faif/python-patterns
Python Design Patterns

# Creational patterns 建造模式

工廠的概念用在很多設計模式上，
例如 工廠模式(factory)、抽象工廠模式(abstract factory)、建造者模式(builder)、單一存在模式(singleton)都有用到工廠"方法”模式表示，工廠的概念不一定會是一個class，有可能是一個靜態方法，定義好的建立步驟。下列情況可以考慮使用工廠方法

* 建立物件需要大量重複的代碼。
* 建立物件需要存取某些訊息，而這些訊息不應該包含在複合類中。
* 建立物件的生命周期必須集中管理，以保證在整個程式中具有一致的行為。

工廠方法會將constructor改為private，進而改以提供自定義的類別建立函數，所以工廠模式最好是在一開始就設計好。而且因為constructor為private，所以無法extend。

## Simple factory pattern 工廠模式

工廠模式，當一個物件的產生需要很多步驟，而且這些步驟的細節你並沒有很想知道，就把這些細節包進工廠裡面，讓工廠幫你處理，而你只要new這個class就可以得到你要的東西，就像是工廠把產品生產好給你一樣。若是需要根據輸入來決定要產生何種產品的話，也可以讓輸入的參數代入factory method裡面。產生出的產品 必然會符合他該有的功能(在物件中就是代表他一定會有interface說好的method)

http://openhome.cc/Gossip/DesignPattern/SimpleFactory.htm

## Abstract factory pattern 抽象工廠模式

建立一組相同主題但是屬性有所不同的class，比如說建立正式員工和派遣員工和工讀生的class，他們都會擁有共同屬性，但是可能屬性值不一樣，比如說工讀生工作時間可能是4小時，正式員工是八小時，薪水可能也會有差，等等的。factory模式和abstract factory模式的差異在於，產出的東西，factory模式產出的東西都一樣，它的class就是都產生出一模一樣的東西，所以叫做工廠。那abstract factory勒，它會產生出同系列的東西，但是屬性上會有所不同，或者可以說是規格上有所不同。比如說都是一樣的記憶體，但是容量卻有1GB或2GB或4GB，但是本質上是一樣的。

http://openhome.cc/Gossip/DesignPattern/AbstractFactory.htm

## Lazy factory pattern 懶惰工廠模式

大體上同工廠模式，但是差別在於不會先產生好物件，

而是在被要求時才會去檢查是否有物件，如果沒有才會生產一個物件，如果有就會去檢查其參數，如果此參數對應的物件已經被產生過了，則回傳該物件，如果此參數對應的物件沒有產生過，那就再產生一個物件。參數對應到物件的對應可以使用hash table去實作。(在php中可用array代替，key值可以用參數去做編碼) 通常用在產生物件花費時間很久的情況下，可以將物件產生的花費給省下來。

## Prototype pattern 原型模式

在產生一個object花費的代價太高，而且沒有重新產生一次的必要性，就可以使用這個模式。簡單來說，就是複製一個object。比如說 class 產生出一個新的物件後 將它存起來，然後之後再有要求要產生的時候，就複製它。

http://openhome.cc/Gossip/DesignPattern/PrototypePattern.htm

## Singleton pattern 單一存在模式

要是這物件已經存在了，就回傳已經存在的物件。這個物件是只會有一個而已，絕對不會有第二個，全部人都共用這個物件。ex: 全域物件，一個port只能有一個程式使用，DAO。

http://openhome.cc/Gossip/DesignPattern/SingletonPattern.htm

## Builder pattern 建造者模式

待補

http://openhome.cc/Gossip/DesignPattern/BuilderPattern.htm

## Director-builder pattern 指導者-建造者模式

Director實作建造的流程，builder就負責用不同材料做出產品，是builder模式的進階版本。
