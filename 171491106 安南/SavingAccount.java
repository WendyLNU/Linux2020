package atm;

import javax.swing.JOptionPane;

/**
 * 储蓄账户类
 */
public class SavingAccount extends Account {
	//构造函数
	public SavingAccount() {
		super();
	}

	public SavingAccount(long id, String password, String name, 
			String personId,String accountType, double balance) {
		super(id, password, name, personId, accountType, balance);
	}
	//对父类的withdraw()实现
	public void withdraw(double money){
		if(balance < money){
			JOptionPane.showMessageDialog(null, "对不起，账户余额不足！",
					"信息提示",JOptionPane.ERROR_MESSAGE);
		}
		else
		{
			balance -= money;			
		}
	}
}
