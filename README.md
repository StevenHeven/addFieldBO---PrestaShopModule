### Add Fields Back Office 1.0



# Fonctionnalité

Permet donc de rajouter un champ à votre classe "Customers" dans Prestashop (version 1.6) et aussi sur votre facture si vous le souhaitez.
    
    
# Avant Installation

##  - Rajoutez le(s) champ(s) dans le back-office

° Dans **"datasql.php"**, modifiez la requête SQL à exécuter en fonction du ou des champ(s) à rajouter à Customers :

    $sql[ ] = 'ALTER TABLE `' . _DB_PREFIX_ . 'customer` ADD `nom_du_champ` TEXT NULL DEFAULT NULL;';

° Dans **"override/classes/Customer.php"**, modifiez cette ligne en fonction de votre champ à ajouter :

    /** @var string nom_du_champ */
    public $nom_du_champ;
    
  Puis modifiez cette ligne au tableau des 'fields' en fonction de votre champ à ajouter : 
  
    'nom_du_champ' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName')
    
° Dans **"override/controllers/admin/AdminCustomersController.php**, ligne **10**, modifiez cette ligne 
en fonction de votre champs à ajouter :

    $this->fields_list['nom_du_champ'] = array (
            'title' => $this->l('Nom du champ'),
        );
        
  Et ligne **94** :
  
     array(
                        'type' => 'text',
                        'label' => $this->l('Nom du Champ'),
                        'name' => 'nom_du_champ',
                        'col' => '4',
                        'required' => false                        
                    ),
                    
  Vous pouvez décaler cette ligne pour faire apparaître votre champ où vous le souhaite dans votre panel admin.
  
° Dans **views/templates/admin/customers/helpers/views/view.tpl**, copiez le code entier et remplacez le contenu du 
fichier dans votre projet Prestashop situé dans  **adminXXXX/themes/default/template/controllers/customers/helpers/view** 

Et modifier l'ensemble suivant, à partir de la ligne **69** :

    <div class="row">
        <label class="control-label col-lg-3">{l s='Nom du Champ'}</label>
        <div class="col-lg-9">
           <p class="form-control-static">{if isset($customer->nom_du_champ)} {$customer->nom_du_champ} {else} {l s='Unknown'} {/if}</p>
        </div>
    </div>

Là aussi, vous pouvez bouger cette section où vous voulez dans ce fichier pour l'affichez à l'endroit où vous le désirer

##  - Rajoutez le(s) champ(s) sur les factures

Dans le fichier *invoice.tpl* situé dans **/pdf**, modifiez selon votre/vos champ(s) la ligne **33** :

    Nom du champ : {$customer->nom_du_champ}

Vous pouvez ajoutez autant de fois cette ligne selon le nombre de vos champs

<br>
<br>
<br>
Vous pouvez maintenez installer votre module.

# Après installation

Allez dans l'onglet "Clients" et constater que votre ou vos champ(s) ont bien été ajoutés.

# Si besoin de réinstallation

Si vous deviez réinstaller ce module, il faut faire deux manipulations : 

° Dans votre pojet PrestaShop, à **override/classes**, supprimez le fichier *Customer.php* <br>
° Et supprimez le fichier *class_index.php* qui se trouve dans le dossier **/cache**

Vous pouvez réinstaller le module !