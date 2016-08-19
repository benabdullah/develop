<?php return
[
    //--------------------------------------------------------------------------------------------------
    // Project 
    //--------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : Copyright (c) 2012-2016, ZN Framework
    //
    //--------------------------------------------------------------------------------------------------
        
    //----------------------------------------------------------------------------------------------
    // Key
    //----------------------------------------------------------------------------------------------
    // Genel Kullanım: Encode sınıfına ait super() yöntemi için oluşturulmuş şifrelemeye          
    // dahil edilecek ilave karakter ayarıdır. Böyle bir kullanımın oluşturulmasının temel    
    // amacı her projede yer alan kullanıcı şifrelerinin birbirlerinden farklı olmasını           
    // sağlayarak şifre güvenliğini sağlamaktır.                                                  
    //----------------------------------------------------------------------------------------------
    'key' => 'default project',

    //--------------------------------------------------------------------------------------------------
    // Benchmarking Test                                                                  
    //--------------------------------------------------------------------------------------------------
    //
    // Bu ayarın true olarak seçilmesi durumunda sistemin açılış hızını
    // ve yüklenme zamanını gösteren bir tablo gösterilir.	     			 	  		  
    //
    //--------------------------------------------------------------------------------------------------
    'benchmark' => false,
	
    //--------------------------------------------------------------------------------------------------
    // Mode                                                                  
    //--------------------------------------------------------------------------------------------------
    //
    // Proje modu belirtilir. Kullanılabilir modlar: publication, restoration, development				     			 	  		  
    //
    //--------------------------------------------------------------------------------------------------
    'mode' => 'development',

    //--------------------------------------------------------------------------------------------------
    // Error Reporting                                                                
    //--------------------------------------------------------------------------------------------------
    //
    // Mevcut hata durumu.				     			 	  		  
    //
    //--------------------------------------------------------------------------------------------------
    'errorReporting' => E_ALL,

    //--------------------------------------------------------------------------------------------------
    // Escape Errors                                                                
    //--------------------------------------------------------------------------------------------------
    //
    // Engellenecek Hata Numaraları Belirtilir.				     			 	  		  
    //
    //--------------------------------------------------------------------------------------------------
    'escapeErrors' => [],
	
    //--------------------------------------------------------------------------------------------------
    // Restoration                                                                 
    //--------------------------------------------------------------------------------------------------
    //
    // Restorasyon işlemlerini başlatmak için yukarıdaki Application:mode ayarını 'Restoration' olarak
    // ayarlamanı gerekmektedir. Bu ayarlamadan sonra aşağıdaki ayarları yapabilirsiniz.				     			 	  		  
    //
    //--------------------------------------------------------------------------------------------------
    'restoration' => 
    [
        //----------------------------------------------------------------------------------------------
        // Machines IP                                                                                  
        //----------------------------------------------------------------------------------------------
        //
        // Uygulama üzerinde restore işlemlerinin yapıldığı makinelere ait ip adresleri belirtilir.
        // Example: ['215.213.21.32', '10.131.18.21', ...]
        //
        //----------------------------------------------------------------------------------------------
        'machinesIP' => ['127.0.0.1'],
		
        //----------------------------------------------------------------------------------------------
        // Pages                                                                                  
        //----------------------------------------------------------------------------------------------
        // Çalışmayan, hata oluşmuş kullanıcıların karşılasması istenmeyen sayfalar belirtilir.	
        // Example: ['employee/profile', 'home/comments', ...]
        //
        //----------------------------------------------------------------------------------------------
        'pages' => [],
		
        //----------------------------------------------------------------------------------------------
        // Route Page                                                                                 
        //----------------------------------------------------------------------------------------------
        // Restoration Pages ayarına belirtilmiş sayfalarından herhangi birine istek yapıldığında
        // bu ayarın belirtildiği sayfaya yönlendirilir.
        // Example: 'restoration/page'
        //
        //----------------------------------------------------------------------------------------------
        'routePage' => ''
    ]
];