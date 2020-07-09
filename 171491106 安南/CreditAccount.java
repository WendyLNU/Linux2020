package atm;

import javax.swing.JOptionPane;

/**
 * �����˻��࣬����һ�����ö��ceiling
 */
public class CreditAccount extends Account{
	private int ceiling;
	//���캯��
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
	//ʵ�ָ����withdraw()
	public void withdraw(double money){
		if((balance + ceiling) < money){
			JOptionPane.showMessageDialog(null, "�Բ����ѳ����������ö�ȣ�",
					"��Ϣ��ʾ",JOptionPane.ERROR_MESSAGE);
		}
		else
		{
			balance -= money;
		}
	}
}

