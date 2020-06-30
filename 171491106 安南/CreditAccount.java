package atm;

import javax.swing.JOptionPane;

/**
 * 信用账户类，增加一个信用额度ceiling
 */
public class CreditAccount extends Account{
	private int ceiling;
	//构造函数
	public CreditAccount(){
		super();
	}
	public CreditAccount(long id, String password, String name,
			String personId,String accountType, double balance, int ceiling){
		super(id, password, name, personId, accountType, balance);
		this.ceiling = ceiling;
	}
	public int getCeiling() {
		return ceiling;
	}
	public void setCeiling(int ceiling) {
		this.ceiling = ceiling;
	}
	//实现父类的withdraw()
	public void withdraw(double money){
		if((balance + ceiling) < money){
			JOptionPane.showMessageDialog(null, "对不起，已超出您的信用额度！",
					"信息提示",JOptionPane.ERROR_MESSAGE);
		}
		else
		{
			balance -= money;
		}
	}
}

