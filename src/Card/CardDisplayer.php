<?php

namespace PennyLaneProperties\Card;

class CardDisplayer
{
    protected array $cardEntities;

    public function cardDisplay($cardEntities){
        foreach ($cardEntities as $cardEntity){
           ?> <div class="col-sm-12 col-md-4 col-lg-3">
             <div class="card card__status
              <?php if ($cardEntity['status'] == 'Sold'){
                  echo '--sold';
              } elseif ($cardEntity['status'] == 'For Sale'){
                  echo '--sale';
              } elseif ($cardEntity['status'] == 'Let'){
                  echo '--letAgreed';
             } else {
                  echo '--toLet';
             }
             ?>
             border border-dark position-relative">
                 <span class="visually-hidden">New alerts</span>
                    <img src="<?php echo $cardEntity['imageUrl'] ?>" class="card-img-top" alt="Photo of <?php echo $cardEntity['address']?>">
                    <div class="card-body">
                     <p class="card-text"><?php echo $cardEntity['address'];?></p>
                     <a href="#" class="btn btn-primary btn-sm align-items-end">PROPERTY DETAILS</a>
                    </div>
             </div>
        </div>

        }

    }