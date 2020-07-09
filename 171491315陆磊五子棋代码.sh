#!/bin/bash
P1=6;P2=1
P3=20;P4=1
P5=14;P6=48
     
function Chess_board ()
{
printf "\n\n\n";printf "%32s " " ";printf "\e[33m----->>FIVE STONE GAME<<-----\e[0m";printf "\n"
printf "<Information:>\n"
printf "%30s\e[43m                                 ";printf "\e[43m \e[0m\n"
for i in {15..1}
do
        for j in {1..15}
        do
                if [ $j = 1 ]
                        then
                        if [ $i -le 9 ]
                                then
                                printf "%30s" " ";echo -ne "\e[43m\e[30m"" "$i" "; printf "\e[43m\e[30m+ \e[0m"
                        else
                                printf "%30s" " ";echo -ne "\e[43m\e[30m"$i" "; printf "\e[43m\e[30m+ \e[0m"
                        fi
                elif [ $j = 15 ]
                        then
                        printf "\e[43m\e[30m+  \e[0m"
                elif [ $j = 8 ] && [ $i = 8 ]
                        then
                        printf "\e[43m\e[30m.\e[43m \e[0m"
                elif [ $j = 4 ] && [ $i = 4 ]
                        then
                        printf "\e[43m\e[30m.\e[43m \e[0m"
                elif [ $j = 12 ] && [ $i = 4 ]
                        then
                        printf "\e[43m\e[30m.\e[43m \e[0m"
                elif [ $j = 4 ] && [ $i = 12 ]
                        then
                        printf "\e[43m\e[30m.\e[43m \e[0m"
                elif [ $j = 12 ] && [ $i = 12 ]
                        then
                        printf "\e[43m\e[30m.\e[43m \e[0m"
                else
                        printf "\e[43m\e[30m+ \e[0m"
                fi
        done
        printf "\n"
done
printf "%30s\e[43m\e[30m   A B C D E F G H I J K L M N O ";printf "\e[43m \e[0m\n"
}
function Location_cursor()
{
        h=$1;l=$2
        printf "\e[$h;$l;H"
}
function Moving_cursor ()
{
        stty cbreak -echo
        dd if=/dev/tty bs=1 count=1 2>/dev/null
        stty -cbreak echo
}
function Choose ()
{
        x=0;y=0;
        while true
        do
        case $(Moving_cursor) in
        i|I)      printf "\e[1A";((x--));;  # Up
        k|K)      printf "\e[1B";((x++));;  # Down
        j|J)      printf "\e[2D";((y--));;  # Left
        l|L)      printf "\e[2C";((y++));;  # Right
                " ")      break;; # Play
                b|B)          Start_game;; # Quit the game
         esac
        done
}
function Test_array ()
{
        point=$1;arr=$2
        test=$(eval echo \${$arr[@]})
        [[ $test == ${test/$point/} ]]
}
function y_n ()
{
        arr=$1
        eval echo \${$arr[@]}|tr ' ' '\n'|sort -t',' -k1,1n -k2,2n|tr ',' ' '|Score $2 $3
}
function x_n (){
        arr=$1
        eval echo \${$arr[@]}|tr ' ' '\n' |awk -F, '{print $2" "$1}' |sort -k1n -k2n |Score $2 $3
}
function xy_l_n(){
        arr=$1
        eval echo \${$arr[@]}|tr ' ' '\n' |awk -F, '{print $1+$2" "$1}' |sort -k1n -k2n |Score $2 $3
}
function xy_r_n(){
        arr=$1
        eval echo \${$arr[@]}|tr ' ' '\n' |awk -F, '{print $1-$2" "$1}' |sort -k1n -k2n |Score $2 $3
}
function Score(){
        num=$2;
        if [ $1 == 1 ]
        then
                awk -vn=$num '{if($1==v1){
                        if($2==v2+1){a[$1]++}
                        else{a[$1]=1}}
                else{a[$1]=1}
                        v1=$1
                        v2=$2}
                END{for(i in a)
                        if(a[i]>=n){print "1";exit}
                        print "0"}
                '
        else
                awk -vn=$num '{if($1==v1){
                        if($2==v2+1){a[$1]++}
                        else{a[$1]=1}}
                else{a[$1]=1}
                        v1=$1
                        v2=$2}
                END{for(i in a){
                                if(a[i]>=n){print sum="1000000000";exit}
                                sum+=a[i]==4?"10000000":10*10^a[i]};
                        print sum}
                '
        fi
}
function Computer_decision(){
        i=0
        unset max_w
        unset max_b
        ((sum_w_old=$(xy_r_n array_white 0 5)+$(xy_l_n array_white 0 5)+$(x_n array_white 0 5)+$(y_n array_white 0 5)))
        ((sum_b_old=$(xy_r_n array_black 0 5)+$(xy_l_n array_black 0 5)+$(x_n array_black 0 5)+$(y_n array_black 0 5)))
        while((i<${#All_pos[@]}))
        do
                black_point_="$black_point ${All_pos[$i]}"
                array_black_=(${black_point_:1})
                while_point_="$white_point ${All_pos[$i]}"
                array_white_=(${while_point_:1})
                ((sum_w=$(xy_r_n array_white_ 0 5)+$(xy_l_n array_white_ 0 5)+$(x_n array_white_ 0 5)+$(y_n array_white_ 0 5)))
                ((sum_b=$(xy_r_n array_black_ 0 5)+$(xy_l_n array_black_ 0 5)+$(x_n array_black_ 0 5)+$(y_n array_black_ 0 5)))
                ((increase_score_b=sum_b-sum_b_old))
                ((increase_score_w=sum_w-sum_w_old))
                if ((sum_w>=1000000000))||((sum_b>=1000000000))
                then
                        echo ${All_pos[$i]}&&s=1&&break
                else
                        if ((max_b>increase_score_b))
                        then
                                ((max_b=max_b))
                        else
                                ((max_b=increase_score_b,index_b=i))
                        fi
                    
                        if ((max_w>increase_score_w))
                        then
                                ((max_w=max_w))
                        else
                                ((max_w=increase_score_w,index_w=i))
                        fi       
                        s=0;
                fi
                ((i++))
        done
        if [ $s != 1 ]
        then
                if ((max_b >= max_w))
                then
                        echo ${All_pos[$index_b]}
                else
                        echo ${All_pos[$index_w]}
                fi
        fi
}
if_continue ()
{       
        Location_cursor 40 1
        read -p "Do you want one more game?  Y/N: " answer1
        case $answer1 in
                y|Y) clear;
                        echo -e '\n\n\n\n\n\n      Do you want to continue player vs player\e[31m(1)\e[0m, or try player vs computer\e[33m(2)\e[0m?  '
                        read -p "      Please choose:  " answer2;
                        case $answer2 in
                                1) Main_program_player_vs_player ;;
                                2) Main_program_player_vs_computer ;;
                        esac;;
                n|N) echo " Thanks!!! ";exit;;
        esac
}
function Win_if ()
{
        who_=$1;
        [ `xy_r_n $1 $2 $3` == 1 ]||[ `xy_l_n $1 $2 $3` == 1 ]||[ `x_n $1 $2 $3` == 1 ]||[ `y_n $1 $2 $3` == 1 ]&& Location_cursor 12 1 && echo "The ${who_##*_} win!!!" && Location_cursor $Cx $Cy && echo -e "\e[47m\e[30m+ \e[0m" && Location_cursor $Cx $Cy &&if_continue
}
function Main_program_player_vs_player ()
{
        clear # CygWin use echo -e "\e[2J"
        Chess_board
        Location_cursor $P5 $P6
        ((Cx=P5,Cy=P6))
        unset test_point step step_b step_w black_point white_point
        array_white=(); array_black=()
        while true
        do
                Choose
                Location_cursor $P3 $P4
                echo -e "                          \n                           \n                            "
                ((Cx=Cx+x,Cy=2*y+Cy))
                ((abs_x=P5-Cx,abs_y=((Cy-P6))/2))
                test_point="$abs_x,$abs_y"
            
                if (($abs_x <= 7)) && (($abs_x >= -7)) && (($abs_y <= 7)) && (($abs_y >= -7))
                then
                        if ! Test_array $test_point array_white || ! Test_array $test_point array_black
                        then
                                Location_cursor $P3 $P4       
                                echo -e "Not allowed\nPlease try again!!!" && test_result=1
                        fi
                else
                        Location_cursor $P3 $P4
                        echo -e "Out of chess broad\nNot allowed\nPlease try again!!!" && test_result=1
                fi
            
                if [ "$test_result" == 1 ]
                then
                        ((Cx=P5-abs_x,Cy=2*abs_y+P6)) && test_result=0
                        Location_cursor $Cx $Cy
                else
                        ((step++))
                        ((who_go=step%2)) 
                        Location_cursor $P1 $P2
                        if [ $who_go = 1 ]
                                then
                                ((step_b++))
                                black_point="$black_point $abs_x,$abs_y"
                                array_black=(${black_point:1})
                                Win_if array_black 1 5
                                Location_cursor $P1 $P2
                                echo -e "\e[31m The Black \e[0m"
                                echo -e "\e[31mStep= $step_b\e[0m" 
                                echo "-->The White's turn<--"
                                echo "Step= $step_w"
                                Location_cursor $Cx $Cy
                                echo -e "\e[40m+ \e[0m"
                                Location_cursor $Cx $Cy
                        else
                                ((step_w++))
                                white_point="$white_point $abs_x,$abs_y" 
                                array_white=(${white_point:1})
                                Win_if array_white 1 5
                                Location_cursor $P1 $P2               
                                echo -e "\e[31m The White \e[0m"
                                echo -e "\e[31mStep= $step_w\e[0m" 
                                echo  "-->The Black's turn<--" 
                                echo  "Step= $step_b"
                                Location_cursor $Cx $Cy
                                echo -e "\e[47m\e[30m+ \e[0m"
                                Location_cursor $Cx $Cy
                        fi
                fi
        done
}
#Main_program
function Main_program_player_vs_computer ()
{
        clear # CygWin use echo -e "\e[2J"
        All_pos=($(echo {-7..7},{-7..7}))
        Chess_board
        Location_cursor $P5 $P6
        ((Cx=P5,Cy=P6))
        unset test_point step step_b step_w black_point white_point
        array_white=(); array_black=()
            
        while true
        do
                Choose
                Location_cursor $P3 $P4
                echo -e "                          \n                           \n                            "
                    
                ((Cx=Cx+x,Cy=2*y+Cy))
                ((abs_x=P5-Cx,abs_y=((Cy-P6))/2))
                test_point="$abs_x,$abs_y"       
                if (($abs_x <= 7)) && (($abs_x >= -7)) && (($abs_y <= 7)) && (($abs_y >= -7))
                then
                        if ! Test_array $test_point array_white
                        then
                                Location_cursor $P3 $P4       
                                echo -e "Not allowed\nPlease try again!!!" && test_result=1
                        fi
                else
                        Location_cursor $P3 $P4
                        echo -e "Out of chess broad\nNot allowed\nPlease try again!!!" && test_result=1
                fi
            
                if [ "$test_result" == 1 ]
                then
                        ((Cx=P5-abs_x,Cy=2*abs_y+P6)) && test_result=0
                        Location_cursor $Cx $Cy
                            
                else
                        Location_cursor $P1 $P2
                            
                        ((step_b++))
                        black_point="$black_point $abs_x,$abs_y"
                        array_black=(${black_point:1})
                        Location_cursor $((P3+2)) $P4
                        Win_if array_black 1 5
                            
                        Location_cursor $P1 $P2
                        echo -e "\e[31mThe Player \e[0m"
                        echo -e "\e[31mStep= $step_b\e[0m"
                        echo "-->The Computer's turn<--"
                        echo "Step= $step_w"
                        Location_cursor $Cx $Cy
                        echo -e "\e[40m+ \e[0m"
                        Location_cursor $Cx $Cy
                        All_pos=(`echo ${All_pos[@]}|sed "s/ $abs_x,$abs_y / /"`)
                            
                # computer:
                        Comp_pos=$(Computer_decision)
                        ((step_w++))
                        white_point="$white_point $Comp_pos"
                        array_white=(${white_point:1})
                        abs_x=${Comp_pos%,*}
                        abs_y=${Comp_pos#*,}
                        ((Cx=P5-abs_x,Cy=2*abs_y+P6))
                        Win_if array_white 1 5
                        All_pos=(`echo ${All_pos[@]}|sed "s/ $Comp_pos / /"`)
                        Location_cursor $P1 $P2
                        echo -e "\e[31mThe Computer \e[0m"
                        echo -e "\e[31mStep= $step_w\e[0m"
                        echo -e "-->The Player's turn<--"
                        echo -e "Step= $step_b"
                        Location_cursor $Cx $Cy
                        echo -e "\e[47m\e[30m+ \e[0m"
                        Location_cursor $Cx $Cy
                fi
        done
}
function Start_game()
{
        clear;  # CygWin use echo -e "\e[2J"
        cat <<Mainpage
            
            
                                  ----->>FIVE STONE GAME<<-----
                                         <<How to play>>
                        *****************************************************
                        *   Game Types:                                            *
                        *       (1) Main_program_player_vs_player           *
                        *       (2) Main_program_player_vs_computer         *
                        *   Control Keys:                                   *
                        *       (i|I)Up                                            *
                        *       (k|K)Down                                   *
                        *       (j|J)Left                                   *
                        *       (l|L)Right                                  *
                        *       (space)Play                                 *
                        *       (B|b)Back to the mainpage                   *
                        *       (q|Q)Quit the game                          *
                        *****************************************************
                                                    
                                                    
Mainpage
        read -p "  Please choose the game you want to play, or quit the game:   " answer;
        case $answer in
                1) Main_program_player_vs_player ;;
                2) Main_program_player_vs_computer ;;
                q|Q) exit;;
        esac
}
Start_game