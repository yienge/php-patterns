PHP-patterns
============

Design patterns in PHP

## 前言

* design patterns只是常見問題的解決方法整理，所以不會只有下列的這些patterns，只要是很多人在程式開發中常常遇到的問題的解法經過彙整，都可以稱之為design patterns。
* design patterns是工程師間觀念溝通的一種工具，常見的design patterns只要講出名稱，就可以快速地讓對方了解你想要怎麼做。
* design patterns 是一種設計觀念，描述一個或多個物件的行為或是互動的方式，所以無關乎實作的語言。可以說每一種語言都可以實作出design patterns所要表達的觀念。

## 參考網頁

http://openhome.cc/Gossip/DesignPattern/
良葛格的設計模式

http://coolshell.cn/articles/8961.html
Coolshell 設計模式經驗分享

http://en.wikipedia.org/wiki/Category:Software_design_patterns
維基設計模式頁面

https://github.com/faif/python-patterns
Python Design Patterns

## Creational patterns 建造模式

工廠的概念用在很多設計模式上，例如 工廠模式(factory)、抽象工廠模式(abstract factory)、建造者模式(builder)、單一存在模式(singleton)都有用到工廠"方法”模式表示，
工廠的概念不一定會是一個class，有可能是一個靜態方法，定義好的建立步驟。下列情況可以考慮使用工廠方法

* 建立物件需要大量重複的代碼。
* 建立物件需要存取某些訊息，而這些訊息不應該包含在複合類中。
* 建立物件的生命周期必須集中管理，以保證在整個程式中具有一致的行為。

工廠方法會將constructor改為private，進而改以提供自定義的類別建立函數，所以工廠模式最好是在一開始就設計好。而且因為constructor為private，所以無法extend。

### Simple factory pattern 工廠模式

工廠模式，當一個物件的產生需要很多步驟，而且這些步驟的細節你並沒有很想知道，就把這些細節包進工廠裡面，
讓工廠幫你處理，而你只要new這個class就可以得到你要的東西，就像是工廠把產品生產好給你一樣。
若是需要根據輸入來決定要產生何種產品的話，也可以讓輸入的參數代入factory method裡面。
產生出的產品 必然會符合他該有的功能(在物件中就是代表他一定會有interface說好的method)
和facade模式很像的地方在於都是將複雜度封裝起來，facade是封裝使用方式，factory是封裝建立物件的流程。

http://openhome.cc/Gossip/DesignPattern/SimpleFactory.htm

### Abstract factory pattern 抽象工廠模式

建立一組相同主題但是屬性有所不同的class，比如說建立正式員工和派遣員工和工讀生的class，
他們都會擁有共同屬性，但是可能屬性值不一樣，比如說工讀生工作時間可能是4小時，正式員工是八小時，薪水可能也會有差，等等的。
factory模式和abstract factory模式的差異在於，產出的東西，factory模式產出的東西都一樣，它的class就是都產生出一模一樣的東西，所以叫做工廠。
至於abstract factory，它會產生出同系列的東西，但是屬性上會有所不同，或者可以說是規格上有所不同。
比如說都是一樣的記憶體，但是容量卻有1GB或2GB或4GB，但是本質和使用方法上是一樣的。
abstract factory的abstract並不是一般物件導向語言中的關鍵字abstract，而是指說它是種只提供零件的抽象工廠，abstract factory都會定義get_parts()之類的方法，
然後再建立物件的時候呼叫抽象工廠的get_parts()去把物件組合出來。

http://openhome.cc/Gossip/DesignPattern/AbstractFactory.htm

### Lazy factory pattern 懶惰工廠模式

大體上同工廠模式，但是差別在於不會先產生好物件，而是在被要求時才會去檢查是否有物件，如果沒有才會生產一個物件，
如果有就會去檢查其參數，如果此參數對應的物件已經被產生過了，則回傳該物件，
如果此參數對應的物件沒有產生過，那就再產生一個物件。
參數對應到物件的對應可以使用hash table去實作。
(在php中可用array代替，key值可以用參數去做編碼)
通常用在產生物件花費時間很久的情況下，可以將物件產生的花費給省下來。

### Prototype pattern 原型模式

在產生一個object花費的代價太高，而且沒有重新產生一次的必要性，就可以使用這個模式。
簡單來說，就是複製一個object。
比如說 class 產生出一個新的物件後 將它存起來，然後之後再有要求要產生的時候，就複製它。

http://openhome.cc/Gossip/DesignPattern/PrototypePattern.htm

### Singleton pattern 單一存在模式

要是這物件已經存在了，就回傳已經存在的物件。
這個物件是只會有一個而已，絕對不會有第二個，全部人都共用這個物件。
ex: 全域物件，一個port只能有一個程式使用，Data Access Object。

http://openhome.cc/Gossip/DesignPattern/SingletonPattern.htm

### Builder pattern 建造者模式

待補

http://openhome.cc/Gossip/DesignPattern/BuilderPattern.htm

### Director-builder pattern 指導者-建造者模式

Director實作建造的流程，builder就負責用不同材料做出產品，是builder模式的進階版本。

### Object-pool pattern 物件池模式

一個物件池是一組已經初始化過且可以使用的物件，而可以不用在有需求時創建和銷毀物件。
在一個物件頻繁地被建立以及銷毀且建立的時間花費巨大的時候，使用這個設計模式可以得到顯著的效能提昇。
池的用戶可以從池子中取得對象，對其進行操作處理，並在不需要時歸還給池子而非銷毀。這是一種特殊的工廠物件。
若初始化、實例化的代價高，且有需求需要經常實例化，但每次實例化的數量較少的情況下，使用對象池可以獲得顯著的效能提升。
從池子中取得對象的時間是可預測的，但新建一個實例所需的時間是不確定。

## Structural patterns 結構模式

### Adapter pattern 轉接器模式

比如說像是四合一讀卡機，它可以將不同的記憶卡資料，通通都轉成USB格式的資料輸出。
或者是說轉接插頭，可以讓美國電壓轉成台灣電壓，讓台灣的電器可以使用而不過電壓太高燒壞。
這就是轉接器，它可以把輸入轉換過丟給輸出。
在物件導向裡面常常用來接在自行定義的interface和第三方API中間作轉換用，也可以稱為中間層，確保功能可以介接。
adapter在概念上很像是decorator，但是在實作上可能會有差異，
因為它會用一個class去對原本不相容的class去做包覆，所以class的名稱可能會因此改變，
但是decorator是用繼承的方式，所以在名字上可能還是會保留原本的class。 

http://openhome.cc/Gossip/DesignPattern/DefaultAdapter.htm

### Bridge pattern 連接器模式

比如說一個燈座可以接不同廠牌的燈泡，你只要燈泡有符合燈座的大小就好。
也就是說，燈座的大小就是那個規格，只要符合規格的就都可以用。
最明顯的範例就是模組化，對外溝通的介面規格是固定的，只要符合這個規格的，就可以串接。
且接上不同的物件，就可以適應不同的情況。
在物件導向裡面，就是使用interface去定義介面，只要實作符合這個介面，就可以傳進來用。
簡單來說 只要讓實作依賴於介面，這就是bridge mode了。
bridge模式和adapter模式的不同在於，adapter會對輸入做轉換，轉成我們要的東西，但是bridge是列好規格讓別人符合就可以做串接。

http://openhome.cc/Gossip/DesignPattern/BridgePattern.htm

### Facade pattern 外觀(拼裝)模式

將很多個API組裝在一起然後對外提供一個介面，輸入參數就可以處理好多個API，
用以簡化操作使用。而且這樣實作就只會依賴在對外提供的那個介面而已，
就算是要修改也只要修改那個interface就好。在一組API被多個class所呼叫時可以有效簡化API進入口。 

http://openhome.cc/Gossip/DesignPattern/FacadePattern.htm

### Decorator pattern 裝飾模式

就是給什麼東西加上個外接的東西，讓他的結果會變不一樣。比如說在輸出的結果加上另外一個物件去做處理，那這另外加的物件就是個decorator。
```
ls -al | grep 'hello' 
```
這個就是在ls的結果上加上一個grep的東西去做處理，

如此一來輸出就是只會含有hello的結果。裝飾類和被裝飾類會使用同樣的interface去實作，如果有需要裝飾的功能，就呼叫被裝飾過的class，
如果不需要的話就呼叫原本的class，因為是在要使用的時候才呼叫，所以可以在運作的時候才決定是否需要這功能。
Python中在函數前加個@decorator的功能即是decorator pattern的典範

http://openhome.cc/Gossip/DesignPattern/DecoratorPattern.htm

### Proxy pattern 代理模式

就是你沒有權限，或者不該是你做的事情，就交給對應的窗口去處理，比如說你打去查號台，想查某個特殊的號碼，那就是你讓查號台當你的代理人。代理依照功能也會有各種不同的代理，

1. 遠端代理：代為尋找資料或物件位置(交給它找就對了)
2. 虛擬代理：用來存放載入需要很長時間的物件(可以控制載入時間點以避免一次大量載入)
3. 安全代理：用來控制物件的存取權限(類似權限控管)
4. 參考代理：在存取物件或資料時，記錄存取的次數或被參考的次數

http://openhome.cc/Gossip/DesignPattern/ProxyPattern.htm

## Behavioral patterns 行為模式

### Strategy pattern 策略模式

類似Delegate mode，但是你可以選擇使用哪一種方法，
class A會使用不同的class(實作)去做同一件事情，但是它可以選擇使用哪一種演算法實作，
不像委託模式的地方在於，委託模式會自己決定該用哪一種方法。
主要精神在於服務細節或演算流程的封裝，將服務或演算法封裝成一個個strategy物件，
讓使用服務的客戶端可以依照需求去抽換演算法或服務的做法，而不用關心實作。

http://openhome.cc/Gossip/DesignPattern/StrategyPattern.htm

### Template method pattern 模板方法模式

在抽象父類別中(用abstract class)定義好需要用到的變數和方法，但是因為實作細節不清楚，
所以留待子類別去實作。可有效規範子類別的介面，確保該有的函數都有。
父類別定義骨架，子類別定義實作。
比如說某個網頁的controller主要處理流程是固定的，但是實際的get和post做的事情卻不大相同，
那就可以在父類別裡面定義主要流程，詳細細節留給子類別去定義。

http://openhome.cc/Gossip/DesignPattern/TemplateMethod.htm

### Observer pattern 觀察者模式 (訂閱模式)

又可以叫做publisher-subscriber模式，簡單來說就是實作通知，事件觸發就會通知訂閱者。
ex: epoll，MVC裡面controller會訂閱view裡面的事件，某個html元件被按到就通知JS做什麼事情。 

http://openhome.cc/Gossip/DesignPattern/ObserverPattern.htm

### Command pattern 命令模式

把動作當成是一個物件，於是一個物件就表示一個動作(或者是稱作命令)，
命令物件可以把行動和參數封裝起來，這些動作可以被執行多次，或者是取消，然後再重做。
用命令模式來實作的功能有：交易行為、進度列、精靈、巨集收錄。
這個模式等於是把你的功能做成一個可接受外掛的介面，
可以讓使用者自訂他們要組合的基本功能。
你只提供增加指令，和執行指令的介面給他們。
主要精神在於將指令的建立和執行分開，在於將建立的部分切割出去。

http://openhome.cc/Gossip/DesignPattern/CommandPattern.htm

### Chain of respondsibility pattern 責任鏈模式

exception的處理就是pattern的實作，如果我丟出的exception不是在這層該處理，那就是更外層的會去處理。
但是記得不要丟太遠，不然也不好處理。
這個模式的重點就在於職責的傳遞，當一個handler無法處理或者不該輪他處理的情況下，就傳給下一個handler。

http://openhome.cc/Gossip/DesignPattern/ChainofResponsibility.htm

### Delegate pattern 委託模式

就是A要做某件事情，但是他會叫class B去幫它做，但是class B其實是叫class C去做，
但是class B也可以選擇叫class D去做，委託模式會使用聚合來代替繼承，
如果還要新增方法的話，可以在class B中新增class E的實作。
