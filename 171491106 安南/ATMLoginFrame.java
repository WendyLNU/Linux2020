package atm;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ATMLoginFrame extends JFrame{

	private JLabel jblCardNo,jblPasswd;
	private JTextField jtfCardNo,jtfPasswd;
	private JButton jbOk,jbCancel,jbOpenAccount;
	private JPanel jp1,jp2,jp3,jp4;
	private Bank bank;
	public ATMLoginFrame(){
		bank=new Bank();

		jblCardNo=new JLabel("用户名:");
		jblPasswd=new JLabel("密    码:");
		jtfCardNo=new JTextField(20);
		jtfPasswd=new JTextField(20);
		jbOk=new JButton("确定");
		jbCancel=new JButton("取消");
		jbOpenAccount=new JButton("没有账户，开户");
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		jp1.add(jblCardNo);
		jp1.add(jtfCardNo);
		jp2.add(jblPasswd);
		jp2.add(jtfPasswd);
		jp3.add(jbOk);
		jp3.add(jbCancel);
		jp4.add(jbOpenAccount);
		//将每行逐行添加到frame中
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.setLayout(new GridLayout(4, 1));
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("登陆界面");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//设置关闭窗口时JVM同时推出
		this.pack();//调整窗口至能容纳组件的最小尺寸
		this.setVisible(true);//设置窗口可见
		this.setResizable(false);//不能最大化
		
		//使用匿名内部类给2个按钮注册监听器
		jbCancel.addActionListener(
			new ActionListener(){
				public void actionPerformed(ActionEvent e) {
					dispose();//关闭窗口
				}
			}
		);
		jbOk.addActionListener(
			new ActionListener(){
				public void actionPerformed(ActionEvent e) {
					//取出用户界面输入的用户名和密码
					long cardNo=Integer.parseInt(jtfCardNo.getText());
					String passwd=jtfPasswd.getText();
					Account account=bank.verifyAccount(cardNo, passwd);
					if(account!=null)//假如正确,进入操作界面
					{
						ATMMainFrame mainFrame=new ATMMainFrame(bank,account);//进入操作界面
						dispose();//关闭登陆界面
					}else{//假如错误,使用对话框提示错误信息
						JOptionPane.showMessageDialog(null, "卡号或密码错误", "信息提示",JOptionPane.ERROR_MESSAGE);
					}
					
					
					
				}
			}
		);
		jbOpenAccount.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					ATMOpenAccountFrame openFram=new ATMOpenAccountFrame();
					dispose();//关闭登陆界面
				}
			}
		);
		
		
		
	}
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		ATMLoginFrame atm=new ATMLoginFrame();

	}

}
