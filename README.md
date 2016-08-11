# CSRFSecPhp
CSRF Sec.

Usage
--
```go
<input type="hidden" name="token" value="<?php generateFormToken('form1');?>">
```

Turkish Description 
---
CSRF (Cross Site Request Forgery) genel yapı olarak sitenin açığından faydalanarak siteye sanki o kullanıcıymış gibi erişerek işlem yapmasını sağlar. Genellikle GET requesleri ve SESSION işlemlerinin doğru kontrol edilememesi durumlarındaki açıklardan saldırganların faydalanmasını sağlamaktadır.

Bu engellemek için bir value'suna token atanan input koyuyoruz eğer dışardan gelen işlem olursa tokenlar uyuşmayacagı için işlem gerçekleşmez.
