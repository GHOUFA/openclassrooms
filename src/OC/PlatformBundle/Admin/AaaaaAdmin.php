<?php

namespace OC\PlatformBundle\Admin;

class AaaaaAdmin extends
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('datede')
            ->add('dateau')
            ->add('societe', null, array('label' => 'Société'))
            ->add('syndicestimer')
            ->add('syndicreel')
           
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            
         
            ->add('id')
            ->add('societe.id', null, array(
                'label' => 'Société'
            ),
                'entity',
                array(
                    'class' => "GLGestionBundle:Societe",
                    'property' => 'nom'
                ))
            ->add('datede')
            ->add('dateau' )
            
            ->add('syndicestimer')
            ->add('syndicreel')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'delete' => array(),
                    'liste Reglement' => array(
                        'template' => 'GLGestionBundle:Aaaaa:list_reglementsyndic_action.html.twig'
                        ),
                    'Reglement du Quitance' => array(
                        'template' => 'GLGestionBundle:Aaaaa:create_syndic_action.html.twig'
                        ),
                    'list_contention' => array(
                        'template' => 'GLGestionBundle:Aaaaa:list_contention_action.html.twig'
                    ),

                    'create_contention' => array(

                    'template' => 'GLGestionBundle:Aaaaa:create_contention_action.html.twig'

                    ),
                    'list_precontention' => array(
                        'template' => 'GLGestionBundle:Aaaaa:list_precontention_action.html.twig'
                    ),
                    'create_precontention' => array(
                        'template' => 'GLGestionBundle:Aaaaa:create_precontention_action.html.twig'
                    )
                    
                    
                    )))
            
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            
            ->tab('periode')
            ->with('periode')
            ->add('datede')
            ->add('dateau')
            ->add('societe', 'sonata_type_model', array(
                'label' => 'Société',
                'class' => "GLGestionBundle:Societe",
                'property' => 'id'
            ))
            ->end()
            ->end()
            ->tab('Montant')
            ->with('montant')
            ->add('syndicestimer')
            ->add('syndicreel')
//            ->add('local', 'sonata_type_model', array(
//                'label' => 'localCOF',
//                'class' => "GLGestionBundle:Local",
//                'property' => 'coefficient'
//            ))
            ->end()
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                
            ->tab('Periode_du_Syndic')
            ->with('Periode_du_Syndic')
            ->add('id')
            ->add('datede')
            ->add('dateau')
            ->add('societe.matriculeFiscale', null, array(
                'label' => 'Société'
            ),
                'entity',
                array(
                    'class' => "GLGestionBundle:Societe",
                    'property' => 'matriculeFiscale'
                ))
            ->add('syndicestimer')
            ->add('syndicreel')
            ->end()
            ->end()
        ;
 
        
    }
    
    
   public function getNewInstance()
    {
        $instance = parent::getNewInstance();

        if ($this->hasRequest()) {
            $locataire = $this->getRequest()->get('locataire', null);

            if ($locataire !== null) {
     
           $entityManager = $this->getModelManager()->getEntityManager('GLGestionBundle:Aaaaa');
                $locataireReference = $entityManager->getReference('GLGestionBundle:Locataire', $locataire);

                $instance->setLocataire($locataireReference);
            }
        }
        return $instance;
    }

    public function createQuery($context = array('list'))
    {
        $request = parent::getRequest();
        $contrat = $request->get('contrat', null);
        $locataire = $request->get('locataire', null);

        $query = parent::createQuery($context);
        if ($contrat !== null) {
            $query->andWhere(
                $query->expr()->eq($query->getRootAlias() . '.contrat', ':my_param')
            );
            $query->setParameter('my_param', $contrat);
        }
        if ($locataire !== null) {
            $query->join($query->getRootAlias() . '.contrat', 'c')
                ->addSelect('c')
                ->where('c.locataire = :locataire')
                ->setParameter('locataire', $locataire);
        }

        return $query;
    }

    public function configure()
    {
        $this->setTemplate('edit', 'GLGestionBundle:Aaaaa:new.html.twig');
    }

    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);
        if (in_array($action, array('show', 'edit', 'delete'))) {
            $list['export_pdf'] = array(
                'template' => 'GLGestionBundle:Reglement:export_pdf_action.html.twig'
            );
        }

        return $list;
    }
    public function getTemplate($name)
    {
        switch ($name) {
            case 'edit':
                return 'GLGestionBundle:CRUD:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('export_pdf', $this->getRouterIdParameter() . '/export-pdf');
        $collection->add('export_all_pdf', 'export-all-pdf');
        $collection->add('preavis', $this->getRouterIdParameter() . '/preavis');
    }

}
