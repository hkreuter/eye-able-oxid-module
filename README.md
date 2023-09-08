How to Use: 
1. Clone Repo into the modules directory of your oxid shop. The keep the provided folder structure:
 ```
   cd <shopRoot>
  git clone https://github.com/Tobias-Eye-Able/Eye_Able_Oxid_7.0.0.git source/dev-packages/EyeAble/EyeAbleAssist
```
2. Install Module from local path:
     ```
   cd <shopRoot>
     composer config repositories.oxid-esales/eyeable path source/dev-packages/EyeAble/EyeAbleAssist
     composer require oxid-esales/eyeable:*
     ```
**Important** <br> 
The module only works when a config file is provided. For getting a Config File you have to contact -> info@eye-able.com . If you do not have one, the Eye-Able Assist Module will not work.
   
