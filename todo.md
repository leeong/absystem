### todo

> * 设计access权限系统数据库，并代码实现 (完成)
> * C&L函数录入数据库
> * Pjax页面跳转功能（前端）

---
### 约定

1. action 命名
> * 列表 index
> * 添加 add
> * 删除 delete
> * 更新 update

2. class 命名
> * 全选 父/子 choose-all/choose

### 分层

> * service 服务层     用于定义用户相关的服务接口等  介于 Model 和 Controller 之间的部分。和数据的关系弱（所以不宜写入 Model 中），但逻辑又相对独立且需要重用（所以不宜写入 Controller 中）。
> * logic   逻辑层     用于定义用户相关的业务逻辑
> * model   数据层     用于定义数据相关的自动验证和自动完成和数据存取接口
