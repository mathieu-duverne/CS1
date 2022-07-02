$("#button").click(function () {
    var parent = $("#shuffle");
    const divs = parent.children();
    // console.log(divs);
    // console.log(divs.length)
    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
        //  console.log(divs);
    }
      
    // for(let i=0; i<divs.length;i++){
    //     console.log[divs[i]]
    // }
    // console.log(parent.children()[1]);
    // console.log(parent.children()[2]);
    // console.log(parent.children()[3].id);
    // console.log(parent.children()[4]);
    // console.log(parent.children()[5]);
    // console.log(parent.children()[6]);
    // console.log(parent.children()[7]);
    // console.log(parent.children()[8]);
    var parent = $("div");

for(let i =0;i < 9;i++){
    // console.log(parent.children()[i].id)
    if( parent.children()[i].id==9){
        // console.log(parent[0]);
// PAS REUSSI A FAIRE PRENDRE LA PALCE DE LA DIV EMPTY APPEND REALISEE MAIS FAUT IL FAIRE FONCTION COMME PARAMTRE LA POSITION DU BLANC DE IMAGE VIDE
        if(i==0){
            $('#'+parent.children()[1].id).click(function(event){
                let temp = parent.children()[0];
                parent[0].append(parent.children()[1])
                parent[1].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(1);
            })

            $('#'+parent.children()[3].id).click(function(event){
                let temp = parent.children()[0];
                parent[0].append(parent.children()[3])
                parent[3].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(3);
            })

        }
        if(i==1){
            $('#'+parent.children()[0].id).click(function(event){
                let temp = parent.children()[1];
                parent[1].append(parent.children()[0])
                parent[0].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(0);
            })

            $('#'+parent.children()[4].id).click(function(event){
                let temp = parent.children()[1];
                parent[1].append(parent.children()[4])
                parent[4].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(4);
            })
            $('#'+parent.children()[2].id).click(function(event){
                let temp = parent.children()[1];
                parent[1].append(parent.children()[2])
                parent[2].append(temp);
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[5].id).off();
                recursive(2);
            })


        }if(i==2){
            $('#'+parent.children()[1].id).click(function(event){
                let temp = parent.children()[2];
                parent[2].append(parent.children()[1])
                parent[1].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(1);
            })
            $('#'+parent.children()[5].id).click(function(event){
                let temp = parent.children()[2];
                parent[2].append(parent.children()[5])
                parent[5].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(5);
            })

        }if(i==3){
            $('#'+parent.children()[0].id).click(function(event){
                let temp = parent.children()[3];
                parent[3].append(parent.children()[0])
                parent[0].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(0);
            })
            $('#'+parent.children()[4].id).click(function(event){
                let temp = parent.children()[3];
                parent[3].append(parent.children()[4])
                parent[4].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(4);
            })
            $('#'+parent.children()[6].id).click(function(event){
                let temp = parent.children()[3];
                parent[3].append(parent.children()[6])
                parent[6].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(6);
            })

        }if(i==4){

            $('#'+parent.children()[1].id).click(function(event){
                let temp = parent.children()[4];
                parent[4].append(parent.children()[1])
                parent[1].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(1);
            })
            $('#'+parent.children()[3].id).click(function(event){
                let temp = parent.children()[4];
                parent[4].append(parent.children()[3])
                parent[3].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(3);
            })
            $('#'+parent.children()[5].id).click(function(event){
                let temp = parent.children()[4];
                parent[4].append(parent.children()[5])
                parent[5].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(5);
            })
            $('#'+parent.children()[7].id).click(function(event){
                let temp = parent.children()[4];
                parent[4].append(parent.children()[7])
                parent[7].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(7);
            })
        }if(i==5){
            $('#'+parent.children()[2].id).click(function(event){
                let temp = parent.children()[5];
                parent[5].append(parent.children()[2])
                parent[2].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(2);
            })
            $('#'+parent.children()[4].id).click(function(event){
                let temp = parent.children()[5];
                parent[5].append(parent.children()[4])
                parent[4].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(4);
            })
            $('#'+parent.children()[8].id).click(function(event){
                let temp = parent.children()[5];
                parent[5].append(parent.children()[8])
                parent[8].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(8);
            })

        }if(i==6){
            $('#'+parent.children()[3].id).click(function(event){
                let temp = parent.children()[6];
                parent[6].append(parent.children()[3])
                parent[3].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(3);
            })
            $('#'+parent.children()[7].id).click(function(event){
                let temp = parent.children()[6];
                parent[6].append(parent.children()[7])
                parent[7].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(7);
            })

        }if(i==7){
            $('#'+parent.children()[6].id).click(function(event){
                let temp = parent.children()[7];
                parent[7].append(parent.children()[6])
                parent[6].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(6);
            })
            $('#'+parent.children()[4].id).click(function(event){
                let temp = parent.children()[7];
                parent[7].append(parent.children()[4])
                parent[4].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(4);
            })
            $('#'+parent.children()[8].id).click(function(event){
                let temp = parent.children()[7];
                parent[7].append(parent.children()[8])
                parent[8].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(8);
            })

        }if(i==8){
            $('#'+parent.children()[7].id).click(function(event){
                let temp = parent.children()[8];
                parent[8].append(parent.children()[7])
                parent[7].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(7);
            })

            $('#'+parent.children()[5].id).click(function(event){
                let temp = parent.children()[8];
                parent[8].append(parent.children()[5])
                parent[5].append(temp);
                $('#'+parent.children()[0].id).off();
                $('#'+parent.children()[1].id).off();
                $('#'+parent.children()[2].id).off();
                $('#'+parent.children()[3].id).off();
                $('#'+parent.children()[4].id).off();
                $('#'+parent.children()[5].id).off();
                $('#'+parent.children()[6].id).off();
                $('#'+parent.children()[7].id).off();
                $('#'+parent.children()[8].id).off();
                recursive(5);
            })
        }
     }
    }
})

function recursive(i){
    var parent = $("div");
    if(i==0){
        $('#'+parent.children()[1].id).click(function(event){
            let temp = parent.children()[0];
            parent[0].append(parent.children()[1])
            parent[1].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(1);
        })

        $('#'+parent.children()[3].id).click(function(event){
            let temp = parent.children()[0];
            parent[0].append(parent.children()[3])
            parent[3].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(3);
        })

    }
    if(i==1){
        $('#'+parent.children()[0].id).click(function(event){
            let temp = parent.children()[1];
            parent[1].append(parent.children()[0])
            parent[0].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(0);
        })

        $('#'+parent.children()[4].id).click(function(event){
            let temp = parent.children()[1];
            parent[1].append(parent.children()[4])
            parent[4].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(4);
        })
        $('#'+parent.children()[2].id).click(function(event){
            let temp = parent.children()[1];
            parent[1].append(parent.children()[2])
            parent[2].append(temp);
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[5].id).off();
            recursive(2);
        })


    }if(i==2){
        $('#'+parent.children()[1].id).click(function(event){
            let temp = parent.children()[2];
            parent[2].append(parent.children()[1])
            parent[1].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(1);
        })
        $('#'+parent.children()[5].id).click(function(event){
            let temp = parent.children()[2];
            parent[2].append(parent.children()[5])
            parent[5].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(5);
        })

    }if(i==3){
        $('#'+parent.children()[0].id).click(function(event){
            let temp = parent.children()[3];
            parent[3].append(parent.children()[0])
            parent[0].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(0);
        })
        $('#'+parent.children()[4].id).click(function(event){
            let temp = parent.children()[3];
            parent[3].append(parent.children()[4])
            parent[4].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(4);
        })
        $('#'+parent.children()[6].id).click(function(event){
            let temp = parent.children()[3];
            parent[3].append(parent.children()[6])
            parent[6].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(6);
        })

    }if(i==4){

        $('#'+parent.children()[1].id).click(function(event){
            let temp = parent.children()[4];
            parent[4].append(parent.children()[1])
            parent[1].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(1);
        })
        $('#'+parent.children()[3].id).click(function(event){
            let temp = parent.children()[4];
            parent[4].append(parent.children()[3])
            parent[3].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(3);
        })
        $('#'+parent.children()[5].id).click(function(event){
            let temp = parent.children()[4];
            parent[4].append(parent.children()[5])
            parent[5].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(5);
        })
        $('#'+parent.children()[7].id).click(function(event){
            let temp = parent.children()[4];
            parent[4].append(parent.children()[7])
            parent[7].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(7);
        })
    }if(i==5){
        $('#'+parent.children()[2].id).click(function(event){
            let temp = parent.children()[5];
            parent[5].append(parent.children()[2])
            parent[2].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(2);
        })
        $('#'+parent.children()[4].id).click(function(event){
            let temp = parent.children()[5];
            parent[5].append(parent.children()[4])
            parent[4].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(4);
        })
        $('#'+parent.children()[8].id).click(function(event){
            let temp = parent.children()[5];
            parent[5].append(parent.children()[8])
            parent[8].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(8);
        })

    }if(i==6){
        $('#'+parent.children()[3].id).click(function(event){
            let temp = parent.children()[6];
            parent[6].append(parent.children()[3])
            parent[3].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(3);
        })
        $('#'+parent.children()[7].id).click(function(event){
            let temp = parent.children()[6];
            parent[6].append(parent.children()[7])
            parent[7].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(7);
        })

    }if(i==7){
        $('#'+parent.children()[6].id).click(function(event){
            let temp = parent.children()[7];
            parent[7].append(parent.children()[6])
            parent[6].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(6);
        })
        $('#'+parent.children()[4].id).click(function(event){
            let temp = parent.children()[7];
            parent[7].append(parent.children()[4])
            parent[4].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(4);
        })
        $('#'+parent.children()[8].id).click(function(event){
            let temp = parent.children()[7];
            parent[7].append(parent.children()[8])
            parent[8].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(8);
        })

    }if(i==8){
        $('#'+parent.children()[7].id).click(function(event){
            let temp = parent.children()[8];
            parent[8].append(parent.children()[7])
            parent[7].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(7);
        })

        $('#'+parent.children()[5].id).click(function(event){
            let temp = parent.children()[8];
            parent[8].append(parent.children()[5])
            parent[5].append(temp);
            $('#'+parent.children()[0].id).off();
            $('#'+parent.children()[1].id).off();
            $('#'+parent.children()[2].id).off();
            $('#'+parent.children()[3].id).off();
            $('#'+parent.children()[4].id).off();
            $('#'+parent.children()[5].id).off();
            $('#'+parent.children()[6].id).off();
            $('#'+parent.children()[7].id).off();
            $('#'+parent.children()[8].id).off();
            recursive(5);
        })
    }

}